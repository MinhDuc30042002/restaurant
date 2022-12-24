<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    @font-face{
      font-family: 'BeVietnamPro';
        font-weight: normal;
        font-style: italic;
        font-variant: normal;
      src: url({{storage_path('fonts/BeVietnamPro-Italic.ttf')}});
    }
    @font-face{
      font-family: 'BeVietnamPro';
        font-weight: normal;
        font-style: Bold;
        font-variant: normal;
      src: url({{storage_path('fonts/BeVietnamPro-Bold.ttf')}});
    }
    body {
      font-family: BeVietnamPro, sans-serif;
    }
  </style>
</head>
<body>
  
</body>
</html>