<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Infor</title>
</head>
<body>
    <h1> Update your company information </h1>
    @if (session('success'))
        <div style="color:green;">
            {{session('success')}}
        </div>
    @elseif(session('error'))
        <div style="color:red;">
            {{session('error')}}
        </div>
    @endif
    <form action = "{{route('com.create')}}" method="post">
        @csrf
        <label> Company Name: </label><br>
        <input type='text' name='companyname' ><br>
        <label> Website: </label><br>
        <input type='text' name='website' ><br>
        <label> Phone: </label><br>
        <input type='text' name='phone' ><br>
        <label> Address: </label><br>
        <input type='text' name='address' ><br>
        <label> Select Carrer: </label><br>
        <select name="career_id" id="career_id">
            @foreach ($careers as $career)
                <option value= "{{ $career -> id }}">{{ $career -> name}}</option>
            @endforeach
        </select><br>
        <button type="submit"> Update Infor</button>
    </form>
</body>
</html>
