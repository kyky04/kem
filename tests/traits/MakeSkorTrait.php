<?php

use Faker\Factory as Faker;
use App\Models\Skor;
use App\Repositories\SkorRepository;

trait MakeSkorTrait
{
    /**
     * Create fake instance of Skor and save it in database
     *
     * @param array $skorFields
     * @return Skor
     */
    public function makeSkor($skorFields = [])
    {
        /** @var SkorRepository $skorRepo */
        $skorRepo = App::make(SkorRepository::class);
        $theme = $this->fakeSkorData($skorFields);
        return $skorRepo->create($theme);
    }

    /**
     * Get fake instance of Skor
     *
     * @param array $skorFields
     * @return Skor
     */
    public function fakeSkor($skorFields = [])
    {
        return new Skor($this->fakeSkorData($skorFields));
    }

    /**
     * Get fake data of Skor
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSkorData($skorFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_siswa' => $fake->randomDigitNotNull,
            'id_soal' => $fake->randomDigitNotNull,
            'skor' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $skorFields);
    }
}
