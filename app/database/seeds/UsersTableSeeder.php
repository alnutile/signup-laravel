<?php
class UsersTableSeeder extends Seeder {

	public function run() 
	{
		$Users[] = array(
			'username' => 'admin', 
			'firstname' => 'Admin', 
			'lastname' => 'Tester', 
			'email' => 'admin@example.com', 
			'company' => 'Test Company', 
			'password' => Hash::make('welcome'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			);
		DB::table('users')->insert($Users);
	}
}