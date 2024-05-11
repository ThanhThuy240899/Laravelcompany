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

    <a href="{{ route('com.update') }}"><button>Update infor</button></a>
</body>
</html>


