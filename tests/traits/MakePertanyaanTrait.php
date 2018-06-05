<?php

use Faker\Factory as Faker;
use App\Models\Pertanyaan;
use App\Repositories\PertanyaanRepository;

trait MakePertanyaanTrait
{
    /**
     * Create fake instance of Pertanyaan and save it in database
     *
     * @param array $pertanyaanFields
     * @return Pertanyaan
     */
    public function makePertanyaan($pertanyaanFields = [])
    {
        /** @var PertanyaanRepository $pertanyaanRepo */
        $pertanyaanRepo = App::make(PertanyaanRepository::class);
        $theme = $this->fakePertanyaanData($pertanyaanFields);
        return $pertanyaanRepo->create($theme);
    }

    /**
     * Get fake instance of Pertanyaan
     *
     * @param array $pertanyaanFields
     * @return Pertanyaan
     */
    public function fakePertanyaan($pertanyaanFields = [])
    {
        return new Pertanyaan($this->fakePertanyaanData($pertanyaanFields));
    }

    /**
     * Get fake data of Pertanyaan
     *
     * @param array $postFields
     * @return array
     */
    public function fakePertanyaanData($pertanyaanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_soal' => $fake->randomDigitNotNull,
            'pertanyaan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pertanyaanFields);
    }
}
