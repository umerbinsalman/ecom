# ECOM Test
I have added 2 default users
1. Email: umer@gmail.com Pass: secret
2. Email: dani@gmail.com Pass: secret

# After Cloning
1. create an .env file
2. generate key using <code>php artisan key:generate</code>
3. run composer update

# About Policy
I have created a policy that only the creator of a category can update it.

# About Middleware
Created a middleware so that only umer@gmail.com can add prroducts.

# To Properly Test
1. Create a tag.
2. Create a category and associate a tag with it.
3. Finally you can add product with multiple tags and categories.

<strong>Note:</strong> The counters on dashboard are functional
