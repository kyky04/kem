<?php

use Faker\Factory as Faker;
use App\Models\Siswa;
use App\Repositories\SiswaRepository;

trait MakeSiswaTrait
{
    /**
     * Create fake instance of Siswa and save it in database
     *
     * @param array $siswaFields
     * @return Siswa
     */
    public function makeSiswa($siswaFields = [])
    {
        /** @var SiswaRepository $siswaRepo */
        $siswaRepo = App::make(SiswaRepository::class);
        $theme = $this->fakeSiswaData($siswaFields);
        return $siswaRepo->create($theme);
    }

    /**
     * Get fake instance of Siswa
     *
     * @param array $siswaFields
     * @return Siswa
     */
    public function fakeSiswa($siswaFields = [])
    {
        return new Siswa($this->fakeSiswaData($siswaFields));
    }

    /**
     * Get fake data of Siswa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSiswaData($siswaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_kelas' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'username' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'jenis_kelamin' => $fake->randomDigitNotNull,
            'sekolah' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $siswaFields);
    }
}
