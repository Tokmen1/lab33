<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Country</title>
</head>

<body>
    <h1>New Country</h1>
    <form method="POST" action={{ action([App\Http\Controllers\CountryController::class, 'store']) }}>
        @csrf
        <label for='country_name'>Country name</label>
        <input type="text" name="country_name" id="country_name">
        <label for='country_code'>Country code</label>
        <input type="text" name="country_code" id="country_code">
        <button type="submit" value="Add">Save</button>
    </form>
</body>
</html>