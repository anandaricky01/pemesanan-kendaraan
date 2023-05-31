<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    {{-- @vite('resources/css/app.css') --}}
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    @vite('resources/js/app.js')


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script src="https://cdn.plot.ly/plotly-2.18.2.min.js"></script>

    <title>Dashboard Admin</title>
</head>

<body class="dark:bg-slate-900">

    <style>
        #loading-screen {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  z-index: 9999;
}

#loading-spinner {
  width: 50px;
  height: 50px;
  border: 4px solid #f3f3f3;
  border-top: 4px solid #3498db;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
      </style>

    <div id="loading-screen">
        <div id="loading-spinner"></div>
    </div>

    
    @include('dashboard.layout.components.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('container')
        </div>
    </div>
    @include('dashboard.layout.components.javascript')
</body>

</html>
