<?php

use Faker\Factory as Faker;
use App\Models\Admin;
use App\Repositories\AdminRepository;

trait MakeAdminTrait
{
    /**
     * Create fake instance of Admin and save it in database
     *
     * @param array $adminFields
     * @return Admin
     */
    public function makeAdmin($adminFields = [])
    {
        /** @var AdminRepository $adminRepo */
        $adminRepo = App::make(AdminRepository::class);
        $theme = $this->fakeAdminData($adminFields);
        return $adminRepo->create($theme);
    }

    /**
     * Get fake instance of Admin
     *
     * @param array $adminFields
     * @return Admin
     */
    public function fakeAdmin($adminFields = [])
    {
        return new Admin($this->fakeAdminData($adminFields));
    }

    /**
     * Get fake data of Admin
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAdminData($adminFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'string' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $adminFields);
    }
}
