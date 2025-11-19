<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->where('status','published')->firstOrFail();

        $rules = [
            'comment' => 'required|string',
            'parent_id' => 'nullable|integer',
            // name is optional now; if user is not logged in and doesn't provide a name we'll use a sensible default
            'name' => 'nullable|string|max:255',
        ];

        $data = $request->validate($rules);

        $comment = new Comment();
        $comment->blog_id = $blog->id;
        $comment->comment = $data['comment'];
        $comment->parent_id = $data['parent_id'] ?? null;

        if (Auth::check()) {
            // Logged-in user (e.g., Google) - prefer their account data
            $comment->user_id = Auth::id();
            $comment->name = Auth::user()->name ?? ($data['name'] ?? 'User');
            $comment->email = Auth::user()->email ?? null;
            $comment->foto = Auth::user()->foto ?? null;
        } else {
            // Guest poster
            $givenName = trim($data['name'] ?? '');
            if ($givenName !== '') {
                $comment->name = $givenName;
                $clean = preg_replace('/[^A-Za-z0-9._-]/', '', strtolower(str_replace(' ', '', $givenName)));
                $comment->email = $clean ? $clean . '@gmail.com' : null;
            } else {
                // no name provided by guest - use a generic fallback
                $comment->name = 'Guest';
                $comment->email = 'guest@guest.com';
            }
            $comment->foto = null;
        }

        $comment->save();

        // Prepare response payload for AJAX requests: return server-rendered HTML for parity
        if ($request->expectsJson()) {
            $foto = $comment->foto;
            if ($foto && !Str::startsWith($foto, ['http://', 'https://'])) {
                $foto = Storage::url($foto);
            }

            // Render server-side partial for the single comment so inserted HTML matches styling
            $html = view('blog_details._comment', ['comment' => $comment, 'foto' => $foto])->render();

            return response()->json([
                'id' => $comment->id,
                'blog_id' => $comment->blog_id,
                'parent_id' => $comment->parent_id,
                'html' => $html,
            ], 201);
        }

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }

    /**
     * Delete a comment. Only the owner (authenticated user who created it) can delete.
     */
    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        if (!Auth::check() || $comment->user_id !== Auth::id()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }
            abort(403);
        }

        $comment->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Deleted'], 200);
        }

        return redirect()->back()->with('success', 'Comment deleted.');
    }
}
