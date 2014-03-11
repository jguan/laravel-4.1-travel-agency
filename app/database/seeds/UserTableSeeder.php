<?php

class UserTableSeeder extends Seeder {

	public function run() {
		$user = new User;
		$user->username = 'admin';
		$user->password = Hash::make('password');
		$user->save();
	}
}
