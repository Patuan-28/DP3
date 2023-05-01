<head>
    <meta charset="utf-8" />
    <title>{{config('app.name') . ': ' .$title ?? config('app.name')}}</title>
    <meta name="author" content="Yada Ekidanta" />
	<meta name="description" content="Yada Ekidanta is a digitalization company that was formed to be a solution for the dynamics occurring in various regions of Indonesia. Along with the changing times into the era of digitalization, all sectors and problems that occur must revolutionize systems and habits to keep up with market developments and the times. With the development of this era, the level of problems, unemployment and crime has increased and people have lost their welfare in life. Yada Ekidanta is here to participate in helping resolve the dynamics that occur as a result of the changing times. And we focus on supporting digitalisation changes in every sector and in various regions." />
	<meta name="keywords" content="{{$keyword ?? ''}}" />
	<link rel="canonical" href="https://yadaekidanta.com" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="shortcut icon" href="{{asset('img/logo.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('keenthemes/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('keenthemes/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>