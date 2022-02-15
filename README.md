### About CustomerVouchers API

On this project you will be available to check for available customers by their ID's with their respectives
vouchers assigned onto them.

If you are running this system for the first time, there are a couple of thing that you'll have to do to make
sure that it works fine.

Please copy **.env.example** file and rename it to **.env** and make sure that you have a concurring connection with an MySQL database, and
create a schema on it named _customer_vouchers_, or the name that you like most, by please make sure that
the value at _DB_DATABASE_ is that same name.

Please make sure that you have Laravel up and running.

Once you made sure that Laravel is running on the machine, please execute the following command on a terminal

> _php artisan key:generate_

In order to add the APP_KEY parameter to your _.env_ file

After that, you will have to execute this command:

> _php artisan migrate:fresh --seed_

In order to migrate the required data on to the database.

This will provide you with a bunch of mocked data for testing purposes.

For using the endpoints required I created a fake user as well, and its credentials are:

> email:challenge@test.com
>
> password:123456

In order to obtain permissions for the data endpoints, you will need to authenticate yourself
(with the provided fake user, for instance) on:

> _POST_ /api/authenticate

This endpoint expects parameters _email_ and _password_ to be included in the request as _x-www-form-urlencoded_
format, which you will be able to do so using tools such as Postman. If the authentication is successfull
you will have a Json response with the success status of the operation and the token associated with the user.

______

> _GET_ /api/customers/{id}

Making requests on this point with the id of the customer that you want to look up for, will fetch the customer
associated with the given id (if any) and its related vouchers.

If no customer is found with the provided id, it will throw a 404 exception.
_____

> _GET_ /api/vouchers/{id}

Making requests on this point with the id of the voucher that you want to check for validity, a token
will be valid as its _valid_through_ date time attribute is a date in the future.

If no voucher is found with the provided id, it will throw a 404 exception.


