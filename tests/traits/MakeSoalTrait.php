<?php

use Faker\Factory as Faker;
use App\Models\Soal;
use App\Repositories\SoalRepository;

trait MakeSoalTrait
{
    /**
     * Create fake instance of Soal and save it in database
     *
     * @param array $soalFields
     * @return Soal
     */
    public function makeSoal($soalFields = [])
    {
        /** @var SoalRepository $soalRepo */
        $soalRepo = App::make(SoalRepository::class);
        $theme = $this->fakeSoalData($soalFields);
        return $soalRepo->create($theme);
    }

    /**
     * Get fake instance of Soal
     *
     * @param array $soalFields
     * @return Soal
     */
    public function fakeSoal($soalFields = [])
    {
        return new Soal($this->fakeSoalData($soalFields));
    }

    /**
     * Get fake data of Soal
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSoalData($soalFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_kelas' => $fake->randomDigitNotNull,
            'pertanyaan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $soalFields);
    }
}
