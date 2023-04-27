<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manufacturers in {{$country->name}}</title>
</head>

<body>
    <h1>Manufacturers in {{$country->name}}</h1>
    @if (count($manufacturers) == 0)
        <p style="color: red;"> There are no records in the database!</p>
    @else
        <ul>
            @foreach ($manufacturers as $manufacturer)
                <li>
                    <a href='{{ url("manufacturer/$manufacturer->id/models")}}'>{{ $manufacturer->name }}</a>
                    <form method="POST"
                        action="{{ route('manufacturer.destroy', $manufacturer->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="delete">Delete</button>
                    </form>
                </li>
                
            @endforeach
        </ul>
    @endif
    <a href="{{ action([App\Http\Controllers\ManufacturerController::class, 'create'],['countryslug' => $country->code])}}">Add new manufacturer</a>
</body>

</html>