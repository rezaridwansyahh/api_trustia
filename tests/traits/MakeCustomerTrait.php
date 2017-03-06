<?php

use Faker\Factory as Faker;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

trait MakeCustomerTrait
{
    /**
     * Create fake instance of Customer and save it in database
     *
     * @param array $customerFields
     * @return Customer
     */
    public function makeCustomer($customerFields = [])
    {
        /** @var CustomerRepository $customerRepo */
        $customerRepo = App::make(CustomerRepository::class);
        $theme = $this->fakeCustomerData($customerFields);
        return $customerRepo->create($theme);
    }

    /**
     * Get fake instance of Customer
     *
     * @param array $customerFields
     * @return Customer
     */
    public function fakeCustomer($customerFields = [])
    {
        return new Customer($this->fakeCustomerData($customerFields));
    }

    /**
     * Get fake data of Customer
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCustomerData($customerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'alamat' => $fake->text,
            'kodepos' => $fake->word,
            'telepon_rumah' => $fake->word,
            'no_hp' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $customerFields);
    }
}
