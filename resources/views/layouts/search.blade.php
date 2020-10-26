<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <form action="{{ route('post.search}}">
    <select name="home" id="">
        <option value="清水の杜">清水の杜</option>
        <option value="花">花</option>
        <option value="海">海</option>
        <option value="水">水</option>
        <option value="ひまわり">ひまわり</option>
        <option value="ツツジ">ツツジ</option>
    </select>
    </form>
</body>
</html>