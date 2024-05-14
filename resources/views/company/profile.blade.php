<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
</head>
<body>

    <h1>Company Profile</h1>

    <h2>Companyname: {{ $companyInfo['companyname'] ?? '' }}</h2>
    <p><strong>Email:</strong> {{ $companyInfo['email'] ?? '' }}</p>
    <p><strong>Website:</strong> {{ $companyInfo['website'] ?? '' }}</p>
    <p><strong>Phone:</strong> {{ $companyInfo['phone'] ?? '' }}</p>
    <p><strong>Address:</strong> {{ $companyInfo['address'] ?? '' }}</p>
    <a href="{{ route('com.update') }}"><button>Update info</button></a>
    <form action="{{ route('com.search') }}" method="post">
        @csrf
        <input name="search" type="text">
        <button type="submit">Search</button>
    </form>
    @if (session('message'))
    <p style="color:red;">{{session('message')}}</p><br>
    @endif
    @if ($candidatesInfor)
        @foreach ($candidatesInfor as $candidateInfor)
            <div>
                <h1>{{ $candidateInfor['full_name'] }}</h1>
                <h3>Job: {{ $candidateInfor['job'] }}</h3>
                <p>{{ $candidateInfor['bio'] }}</p>
                <a href="#"><button>Infor</button></a>
                <a href="#"><button>Send message</button></a>
            </div>
        @endforeach
    @endif

</body>
</html>
