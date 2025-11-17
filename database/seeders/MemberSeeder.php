<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $members = [
            [
                'foto' => 'members/bayu.png',
                'name' => 'Bayu Agusworo',
                'position' => 'Ketua BMI',
                'sector' => 'MFG',
                'business' => 'Dewoz art',
                'product' => 'Furniture',
                'domicile' => 'Tarikolot-Citeureup',
                'phone' => '08131196895',
            ],
            [
                'foto' => 'members/ety.png',
                'name' => 'Ety Rustiyah Budi Hastuti',
                'position' => 'Sekretaris',
                'sector' => 'MFG',
                'business' => 'CV. Adiwijaya Teknik',
                'product' => 'Machining, Fabrikasi',
                'domicile' => 'Karang Asem Barat - Citeureup',
                'phone' => '085643992099',
            ],
            [
                'foto' => 'members/fitria.png',
                'name' => 'Fitria',
                'position' => 'Bendahara 2',
                'sector' => 'KUL',
                'business' => 'HANARA CAKE',
                'product' => 'CAKE',
                'domicile' => 'Gunung sari-Citeureup',
                'phone' => '085156955355',
            ],
            [
                'foto' => 'members/juhana.png',
                'name' => 'Juhana',
                'position' => 'Pengawas',
                'sector' => 'KUL',
                'business' => 'Bogor Sari Nutrisi',
                'product' => 'Yoghurt',
                'domicile' => 'Ciawi',
                'phone' => '081865699225',
            ],
            [
                'foto' => 'members/yati.png',
                'name' => 'Karyati',
                'position' => 'Bendahara 1',
                'sector' => 'KUL',
                'business' => 'King Kiripik',
                'product' => 'Keripik Pisang, Basreng',
                'domicile' => 'Tarikolot-Citeureup',
                'phone' => '081296549446',
            ],
            [
                'foto' => 'members/nani.png',
                'name' => 'Nani',
                'position' => 'Anggota',
                'sector' => 'KUL',
                'business' => 'Naninu Kitchen',
                'product' => 'Keju kriwil, roti sus',
                'domicile' => 'Kranggan - Citeureup',
                'phone' => '081211564449',
            ],
            [
                'foto' => 'members/yatini.png',
                'name' => 'Yatini',
                'position' => 'Anggota',
                'sector' => 'KUL',
                'business' => 'Lancar Barokah',
                'product' => 'Kerupuk Rambak',
                'domicile' => 'Gunung Putri - Citeureup',
                'phone' => '081291473074',
            ],
            [
                'foto' => 'members/juminah.png',
                'name' => 'Juminah',
                'position' => 'Anggota',
                'sector' => 'KUL',
                'business' => 'Cemilan Zomed',
                'product' => 'Kacang Goreng',
                'domicile' => 'Puspanegara - Citeureup',
                'phone' => '081291473074',
            ],
            [
                'foto' => 'members/maryanti.png',
                'name' => 'Maryanti',
                'position' => 'Anggota',
                'sector' => 'KUL',
                'business' => 'Keripik Tiga Saudara',
                'product' => 'Keripik Tempe',
                'domicile' => 'Gunung Putri - Citeureup',
                'phone' => '081291473074',
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}