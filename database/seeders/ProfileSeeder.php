<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numbers = [
            '08161776623',
            '08157676208',
            '08188430651',
            '08187765326',
            '08176077144',
            '09087477073',
            '08127415352',
            '08191681262',
            '08168828747',
            '08195023836',
            '08198008111',
            '09096738254',
            '08162004285',
            '08166810731',
            '08130133373',
            '09093214002',
            '08154125422',
            '08160702315',
            '08143817877',
            '08194806336',
            '08133183466',
        ];
        $users = User::where('role', 2)->get();
        foreach ($users  as $key => $user) {
            DB::table('profiles')->insert([
                'user_id' => $user->id,
                'phone' => $numbers[$key],
                'designation' => 'Managing Director',
                'address' => 'Sherpur Sadar Upazila',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
