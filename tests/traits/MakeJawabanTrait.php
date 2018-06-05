<?php

use Faker\Factory as Faker;
use App\Models\Jawaban;
use App\Repositories\JawabanRepository;

trait MakeJawabanTrait
{
    /**
     * Create fake instance of Jawaban and save it in database
     *
     * @param array $jawabanFields
     * @return Jawaban
     */
    public function makeJawaban($jawabanFields = [])
    {
        /** @var JawabanRepository $jawabanRepo */
        $jawabanRepo = App::make(JawabanRepository::class);
        $theme = $this->fakeJawabanData($jawabanFields);
        return $jawabanRepo->create($theme);
    }

    /**
     * Get fake instance of Jawaban
     *
     * @param array $jawabanFields
     * @return Jawaban
     */
    public function fakeJawaban($jawabanFields = [])
    {
        return new Jawaban($this->fakeJawabanData($jawabanFields));
    }

    /**
     * Get fake data of Jawaban
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJawabanData($jawabanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_soal' => $fake->randomDigitNotNull,
            'jawaban' => $fake->word,
            'benar' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $jawabanFields);
    }
}
