<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Borrower</title>
</head>
<body>
<h1>New Borrower</h1>
    <p>A new borrower has been added to the system.</p>
    <p>Business: {{ $borrower->legal_business_name }}</p>
    <p>Address: {{ $borrower->business_physical_address }}</p>
    <p>City: {{ $borrower->business_physical_city }}</p>
    <p>Email: {{ $borrower->email }}</p>
</body>
</html>
