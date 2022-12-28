<x-app-layout>
    <div class="py-1 pb-10">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex-1 min-w-0 py-8">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate ">Dashboard</h2>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <main id="main" class="flex-1">
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                            <div wire:id="XyQVY3JZmlJG1MaiWH9t">
                                <div class="md:flex md:items-center md:justify-between">
                                    
                                    <div class="mt-4 flex md:mt-0 md:ml-4">
                                        <div class="relative" x-data="{ open: false }" @click.outside="open = false"
                                            @close.stop="open = false">
                                            
                
                                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-95"
                                                class="absolute z-50 mt-2 w-full rounded-md shadow-lg origin-top-right right-0"
                                                @click="open = false" style="display: none;">
                                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                        role="button" href="{{route('dashboard')}}">Last 7 days</a>
                                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                        role="button" >Last 10 days</a>
                                                    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                                        role="button" wire:click="$set('periods', 30)">Last 30 days</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                                    <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0">
                                        <div class="px-4 py-6 sm:p-6">
                                            <div class="flex items-center justify-between">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Tổng đơn hàng</dt>
                                                    <dd class="mt-1 text-3xl font-semibold text-blue-600">{{$order}}</dd>
                                                </dl>
                                                <div class="md:hidden lg:block">
                                                    <div x-ref="chartElement" style="min-height: 46px;">
                                                        <div id="apexcharts2qnni2cv"
                                                            class="apexcharts-canvas apexcharts2qnni2cv apexcharts-theme-light"
                                                            style="width: 100px; height: 46px;"><svg id="SvgjsSvg5332" width="100"
                                                                height="46" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <g id="SvgjsG5334" class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(16.619047619047617, 0)">
                                                                    <defs id="SvgjsDefs5333">
                                                                        <linearGradient id="SvgjsLinearGradient5337" x1="0"
                                                                            y1="0" x2="0" y2="1">
                                                                            <stop id="SvgjsStop5338" stop-opacity="0.4"
                                                                                stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5339" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5340" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                        </linearGradient>
                                                                        <clipPath id="gridRectMask2qnni2cv">
                                                                            <rect id="SvgjsRect5343" width="104" height="46"
                                                                                x="-14.619047619047617" y="0" rx="0"
                                                                                ry="0" opacity="1" stroke-width="0"
                                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                                            </rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMask2qnni2cv"></clipPath>
                                                                        <clipPath id="nonForecastMask2qnni2cv"></clipPath>
                                                                        <clipPath id="gridRectMarkerMask2qnni2cv">
                                                                            <rect id="SvgjsRect5344" width="78.76190476190476"
                                                                                height="50" x="-2" y="-2"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                                                fill="#fff"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <line id="SvgjsLine5342" x1="0" y1="0"
                                                                        x2="0" y2="46" stroke-dasharray="3"
                                                                        stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                        x="0" y="0" width="1" height="46"
                                                                        fill="url(#SvgjsLinearGradient5337)" filter="none"
                                                                        fill-opacity="0.9" stroke-width="0"></line>
                                                                    <g id="SvgjsG5365" class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g id="SvgjsG5366" class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"></g>
                                                                    </g>
                                                                    <g id="SvgjsG5374" class="apexcharts-grid">
                                                                        <g id="SvgjsG5375" class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line id="SvgjsLine5377" x1="-12.619047619047617"
                                                                                y1="0" x2="87.38095238095238" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5378" x1="-12.619047619047617"
                                                                                y1="9.2" x2="87.38095238095238" y2="9.2"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5379" x1="-12.619047619047617"
                                                                                y1="18.4" x2="87.38095238095238" y2="18.4"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5380" x1="-12.619047619047617"
                                                                                y1="27.599999999999998" x2="87.38095238095238"
                                                                                y2="27.599999999999998" stroke="#e0e0e0"
                                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line id="SvgjsLine5381" x1="-12.619047619047617"
                                                                                y1="36.8" x2="87.38095238095238" y2="36.8"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5382" x1="-12.619047619047617"
                                                                                y1="46" x2="87.38095238095238" y2="46"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                        </g>
                                                                        <g id="SvgjsG5376" class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line id="SvgjsLine5384" x1="0" y1="46"
                                                                            x2="74.76190476190476" y2="46"
                                                                            stroke="transparent" stroke-dasharray="0"
                                                                            stroke-linecap="butt"></line>
                                                                        <line id="SvgjsLine5383" x1="0" y1="1"
                                                                            x2="0" y2="46" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    </g>
                                                                    <g id="SvgjsG5345"
                                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                                        <g id="SvgjsG5346" class="apexcharts-series" rel="1"
                                                                            seriesName="Orders" data:realIndex="0">
                                                                            <path id="SvgjsPath5350"
                                                                                d="M -4.272108843537415 46L -4.272108843537415 15.771428571428572Q -4.272108843537415 15.771428571428572 -4.272108843537415 15.771428571428572L 4.272108843537415 15.771428571428572Q 4.272108843537415 15.771428571428572 4.272108843537415 15.771428571428572L 4.272108843537415 15.771428571428572L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M -4.272108843537415 46L -4.272108843537415 15.771428571428572Q -4.272108843537415 15.771428571428572 -4.272108843537415 15.771428571428572L 4.272108843537415 15.771428571428572Q 4.272108843537415 15.771428571428572 4.272108843537415 15.771428571428572L 4.272108843537415 15.771428571428572L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                pathFrom="M -4.272108843537415 46L -4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L -4.272108843537415 46"
                                                                                cy="15.771428571428572" cx="4.272108843537415"
                                                                                j="0" val="23"
                                                                                barHeight="30.228571428571428"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5352"
                                                                                d="M 6.408163265306122 46L 6.408163265306122 13.142857142857146Q 6.408163265306122 13.142857142857146 6.408163265306122 13.142857142857146L 14.952380952380953 13.142857142857146Q 14.952380952380953 13.142857142857146 14.952380952380953 13.142857142857146L 14.952380952380953 13.142857142857146L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 6.408163265306122 46L 6.408163265306122 13.142857142857146Q 6.408163265306122 13.142857142857146 6.408163265306122 13.142857142857146L 14.952380952380953 13.142857142857146Q 14.952380952380953 13.142857142857146 14.952380952380953 13.142857142857146L 14.952380952380953 13.142857142857146L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                pathFrom="M 6.408163265306122 46L 6.408163265306122 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 6.408163265306122 46"
                                                                                cy="13.142857142857146" cx="14.952380952380953"
                                                                                j="1" val="25"
                                                                                barHeight="32.857142857142854"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5354"
                                                                                d="M 17.08843537414966 46L 17.08843537414966 21.02857142857143Q 17.08843537414966 21.02857142857143 17.08843537414966 21.02857142857143L 25.63265306122449 21.02857142857143Q 25.63265306122449 21.02857142857143 25.63265306122449 21.02857142857143L 25.63265306122449 21.02857142857143L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 17.08843537414966 46L 17.08843537414966 21.02857142857143Q 17.08843537414966 21.02857142857143 17.08843537414966 21.02857142857143L 25.63265306122449 21.02857142857143Q 25.63265306122449 21.02857142857143 25.63265306122449 21.02857142857143L 25.63265306122449 21.02857142857143L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                pathFrom="M 17.08843537414966 46L 17.08843537414966 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 17.08843537414966 46"
                                                                                cy="21.02857142857143" cx="25.63265306122449"
                                                                                j="2" val="19"
                                                                                barHeight="24.97142857142857"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5356"
                                                                                d="M 27.768707482993193 46L 27.768707482993193 7.885714285714286Q 27.768707482993193 7.885714285714286 27.768707482993193 7.885714285714286L 36.31292517006803 7.885714285714286Q 36.31292517006803 7.885714285714286 36.31292517006803 7.885714285714286L 36.31292517006803 7.885714285714286L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 27.768707482993193 46L 27.768707482993193 7.885714285714286Q 27.768707482993193 7.885714285714286 27.768707482993193 7.885714285714286L 36.31292517006803 7.885714285714286Q 36.31292517006803 7.885714285714286 36.31292517006803 7.885714285714286L 36.31292517006803 7.885714285714286L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                pathFrom="M 27.768707482993193 46L 27.768707482993193 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 27.768707482993193 46"
                                                                                cy="7.885714285714286" cx="36.31292517006803"
                                                                                j="3" val="29"
                                                                                barHeight="38.114285714285714"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5358"
                                                                                d="M 38.44897959183673 46L 38.44897959183673 17.08571428571429Q 38.44897959183673 17.08571428571429 38.44897959183673 17.08571428571429L 46.993197278911566 17.08571428571429Q 46.993197278911566 17.08571428571429 46.993197278911566 17.08571428571429L 46.993197278911566 17.08571428571429L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 38.44897959183673 46L 38.44897959183673 17.08571428571429Q 38.44897959183673 17.08571428571429 38.44897959183673 17.08571428571429L 46.993197278911566 17.08571428571429Q 46.993197278911566 17.08571428571429 46.993197278911566 17.08571428571429L 46.993197278911566 17.08571428571429L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                pathFrom="M 38.44897959183673 46L 38.44897959183673 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 38.44897959183673 46"
                                                                                cy="17.08571428571429" cx="46.993197278911566"
                                                                                j="4" val="22"
                                                                                barHeight="28.91428571428571"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5360"
                                                                                d="M 49.129251700680264 46L 49.129251700680264 11.82857142857143Q 49.129251700680264 11.82857142857143 49.129251700680264 11.82857142857143L 57.67346938775509 11.82857142857143Q 57.67346938775509 11.82857142857143 57.67346938775509 11.82857142857143L 57.67346938775509 11.82857142857143L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 49.129251700680264 46L 49.129251700680264 11.82857142857143Q 49.129251700680264 11.82857142857143 49.129251700680264 11.82857142857143L 57.67346938775509 11.82857142857143Q 57.67346938775509 11.82857142857143 57.67346938775509 11.82857142857143L 57.67346938775509 11.82857142857143L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                pathFrom="M 49.129251700680264 46L 49.129251700680264 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 49.129251700680264 46"
                                                                                cy="11.82857142857143" cx="57.67346938775509"
                                                                                j="5" val="26"
                                                                                barHeight="34.17142857142857"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5362"
                                                                                d="M 59.8095238095238 46L 59.8095238095238 10.51428571428572Q 59.8095238095238 10.51428571428572 59.8095238095238 10.51428571428572L 68.35374149659863 10.51428571428572Q 68.35374149659863 10.51428571428572 68.35374149659863 10.51428571428572L 68.35374149659863 10.51428571428572L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 59.8095238095238 46L 59.8095238095238 10.51428571428572Q 59.8095238095238 10.51428571428572 59.8095238095238 10.51428571428572L 68.35374149659863 10.51428571428572Q 68.35374149659863 10.51428571428572 68.35374149659863 10.51428571428572L 68.35374149659863 10.51428571428572L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                pathFrom="M 59.8095238095238 46L 59.8095238095238 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 59.8095238095238 46"
                                                                                cy="10.51428571428572" cx="68.35374149659863"
                                                                                j="6" val="27"
                                                                                barHeight="35.48571428571428"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5364"
                                                                                d="M 70.48979591836735 46L 70.48979591836735 35.48571428571429Q 70.48979591836735 35.48571428571429 70.48979591836735 35.48571428571429L 79.03401360544218 35.48571428571429Q 79.03401360544218 35.48571428571429 79.03401360544218 35.48571428571429L 79.03401360544218 35.48571428571429L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMask2qnni2cv)"
                                                                                pathTo="M 70.48979591836735 46L 70.48979591836735 35.48571428571429Q 70.48979591836735 35.48571428571429 70.48979591836735 35.48571428571429L 79.03401360544218 35.48571428571429Q 79.03401360544218 35.48571428571429 79.03401360544218 35.48571428571429L 79.03401360544218 35.48571428571429L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                pathFrom="M 70.48979591836735 46L 70.48979591836735 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 70.48979591836735 46"
                                                                                cy="35.48571428571429" cx="79.03401360544218"
                                                                                j="7" val="8"
                                                                                barHeight="10.514285714285714"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <g id="SvgjsG5348" class="apexcharts-bar-goals-markers"
                                                                                style="pointer-events: none">
                                                                                <g id="SvgjsG5349"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5351"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5353"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5355"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5357"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5359"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5361"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5363"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                            </g>
                                                                        </g>
                                                                        <g id="SvgjsG5347" class="apexcharts-datalabels"
                                                                            data:realIndex="0"></g>
                                                                    </g>
                                                                    <line id="SvgjsLine5385" x1="-12.619047619047617" y1="0"
                                                                        x2="87.38095238095238" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs"></line>
                                                                    <line id="SvgjsLine5386" x1="-12.619047619047617" y1="0"
                                                                        x2="87.38095238095238" y2="0" stroke-dasharray="0"
                                                                        stroke-width="0" stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                    <g id="SvgjsG5387" class="apexcharts-yaxis-annotations"></g>
                                                                    <g id="SvgjsG5388" class="apexcharts-xaxis-annotations"></g>
                                                                    <g id="SvgjsG5389" class="apexcharts-point-annotations"></g>
                                                                </g>
                                                                <rect id="SvgjsRect5341" width="0" height="0"
                                                                    x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"></rect>
                                                                <g id="SvgjsG5373" class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-18, 0)"></g>
                                                                <g id="SvgjsG5335" class="apexcharts-annotations"></g>
                                                            </svg>
                                                            <div class="apexcharts-legend" style="max-height: 23px;"></div>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgb(59, 130, 246);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0">
                                        <div class="px-4 py-6 sm:p-6">
                                            <div class="flex items-center justify-between">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Món ăn đã bán</dt>
                                                    <dd class="mt-1 text-3xl font-semibold text-blue-600">{{$sold}}</dd>
                                                </dl>
                                                <div class="md:hidden lg:block">
                                                    <div x-ref="chartElement" style="min-height: 46px;">
                                                        <div id="apexchartsex6anzx6"
                                                            class="apexcharts-canvas apexchartsex6anzx6 apexcharts-theme-light"
                                                            style="width: 100px; height: 46px;"><svg id="SvgjsSvg5390" width="100"
                                                                height="46" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <g id="SvgjsG5392" class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(16.619047619047617, 0)">
                                                                    <defs id="SvgjsDefs5391">
                                                                        <linearGradient id="SvgjsLinearGradient5395" x1="0"
                                                                            y1="0" x2="0" y2="1">
                                                                            <stop id="SvgjsStop5396" stop-opacity="0.4"
                                                                                stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5397" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5398" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                        </linearGradient>
                                                                        <clipPath id="gridRectMaskex6anzx6">
                                                                            <rect id="SvgjsRect5401" width="104" height="46"
                                                                                x="-14.619047619047617" y="0" rx="0"
                                                                                ry="0" opacity="1" stroke-width="0"
                                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                                            </rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMaskex6anzx6"></clipPath>
                                                                        <clipPath id="nonForecastMaskex6anzx6"></clipPath>
                                                                        <clipPath id="gridRectMarkerMaskex6anzx6">
                                                                            <rect id="SvgjsRect5402" width="78.76190476190476"
                                                                                height="50" x="-2" y="-2"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                                                fill="#fff"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <line id="SvgjsLine5400" x1="0" y1="0"
                                                                        x2="0" y2="46" stroke-dasharray="3"
                                                                        stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                        x="0" y="0" width="1" height="46"
                                                                        fill="url(#SvgjsLinearGradient5395)" filter="none"
                                                                        fill-opacity="0.9" stroke-width="0"></line>
                                                                    <g id="SvgjsG5423" class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g id="SvgjsG5424" class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"></g>
                                                                    </g>
                                                                    <g id="SvgjsG5432" class="apexcharts-grid">
                                                                        <g id="SvgjsG5433" class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line id="SvgjsLine5435" x1="-12.619047619047617"
                                                                                y1="0" x2="87.38095238095238" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5436" x1="-12.619047619047617"
                                                                                y1="9.2" x2="87.38095238095238" y2="9.2"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5437" x1="-12.619047619047617"
                                                                                y1="18.4" x2="87.38095238095238" y2="18.4"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5438" x1="-12.619047619047617"
                                                                                y1="27.599999999999998" x2="87.38095238095238"
                                                                                y2="27.599999999999998" stroke="#e0e0e0"
                                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line id="SvgjsLine5439" x1="-12.619047619047617"
                                                                                y1="36.8" x2="87.38095238095238" y2="36.8"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5440" x1="-12.619047619047617"
                                                                                y1="46" x2="87.38095238095238" y2="46"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                        </g>
                                                                        <g id="SvgjsG5434" class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line id="SvgjsLine5442" x1="0" y1="46"
                                                                            x2="74.76190476190476" y2="46"
                                                                            stroke="transparent" stroke-dasharray="0"
                                                                            stroke-linecap="butt"></line>
                                                                        <line id="SvgjsLine5441" x1="0" y1="1"
                                                                            x2="0" y2="46" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    </g>
                                                                    <g id="SvgjsG5403"
                                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                                        <g id="SvgjsG5404" class="apexcharts-series" rel="1"
                                                                            seriesName="Orders" data:realIndex="0">
                                                                            <path id="SvgjsPath5408"
                                                                                d="M -4.272108843537415 46L -4.272108843537415 12.420000000000002Q -4.272108843537415 12.420000000000002 -4.272108843537415 12.420000000000002L 4.272108843537415 12.420000000000002Q 4.272108843537415 12.420000000000002 4.272108843537415 12.420000000000002L 4.272108843537415 12.420000000000002L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M -4.272108843537415 46L -4.272108843537415 12.420000000000002Q -4.272108843537415 12.420000000000002 -4.272108843537415 12.420000000000002L 4.272108843537415 12.420000000000002Q 4.272108843537415 12.420000000000002 4.272108843537415 12.420000000000002L 4.272108843537415 12.420000000000002L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                pathFrom="M -4.272108843537415 46L -4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L -4.272108843537415 46"
                                                                                cy="12.420000000000002" cx="4.272108843537415"
                                                                                j="0" val="73" barHeight="33.58"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5410"
                                                                                d="M 6.408163265306122 46L 6.408163265306122 8.739999999999995Q 6.408163265306122 8.739999999999995 6.408163265306122 8.739999999999995L 14.952380952380953 8.739999999999995Q 14.952380952380953 8.739999999999995 14.952380952380953 8.739999999999995L 14.952380952380953 8.739999999999995L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 6.408163265306122 46L 6.408163265306122 8.739999999999995Q 6.408163265306122 8.739999999999995 6.408163265306122 8.739999999999995L 14.952380952380953 8.739999999999995Q 14.952380952380953 8.739999999999995 14.952380952380953 8.739999999999995L 14.952380952380953 8.739999999999995L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                pathFrom="M 6.408163265306122 46L 6.408163265306122 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 6.408163265306122 46"
                                                                                cy="8.739999999999995" cx="14.952380952380953"
                                                                                j="1" val="81"
                                                                                barHeight="37.260000000000005"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5412"
                                                                                d="M 17.08843537414966 46L 17.08843537414966 21.16Q 17.08843537414966 21.16 17.08843537414966 21.16L 25.63265306122449 21.16Q 25.63265306122449 21.16 25.63265306122449 21.16L 25.63265306122449 21.16L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 17.08843537414966 46L 17.08843537414966 21.16Q 17.08843537414966 21.16 17.08843537414966 21.16L 25.63265306122449 21.16Q 25.63265306122449 21.16 25.63265306122449 21.16L 25.63265306122449 21.16L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                pathFrom="M 17.08843537414966 46L 17.08843537414966 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 17.08843537414966 46"
                                                                                cy="21.16" cx="25.63265306122449" j="2"
                                                                                val="54" barHeight="24.84"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5414"
                                                                                d="M 27.768707482993193 46L 27.768707482993193 6.439999999999998Q 27.768707482993193 6.439999999999998 27.768707482993193 6.439999999999998L 36.31292517006803 6.439999999999998Q 36.31292517006803 6.439999999999998 36.31292517006803 6.439999999999998L 36.31292517006803 6.439999999999998L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 27.768707482993193 46L 27.768707482993193 6.439999999999998Q 27.768707482993193 6.439999999999998 27.768707482993193 6.439999999999998L 36.31292517006803 6.439999999999998Q 36.31292517006803 6.439999999999998 36.31292517006803 6.439999999999998L 36.31292517006803 6.439999999999998L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                pathFrom="M 27.768707482993193 46L 27.768707482993193 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 27.768707482993193 46"
                                                                                cy="6.439999999999998" cx="36.31292517006803"
                                                                                j="3" val="86" barHeight="39.56"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5416"
                                                                                d="M 38.44897959183673 46L 38.44897959183673 6.439999999999998Q 38.44897959183673 6.439999999999998 38.44897959183673 6.439999999999998L 46.993197278911566 6.439999999999998Q 46.993197278911566 6.439999999999998 46.993197278911566 6.439999999999998L 46.993197278911566 6.439999999999998L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 38.44897959183673 46L 38.44897959183673 6.439999999999998Q 38.44897959183673 6.439999999999998 38.44897959183673 6.439999999999998L 46.993197278911566 6.439999999999998Q 46.993197278911566 6.439999999999998 46.993197278911566 6.439999999999998L 46.993197278911566 6.439999999999998L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                pathFrom="M 38.44897959183673 46L 38.44897959183673 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 38.44897959183673 46"
                                                                                cy="6.439999999999998" cx="46.993197278911566"
                                                                                j="4" val="86" barHeight="39.56"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5418"
                                                                                d="M 49.129251700680264 46L 49.129251700680264 9.659999999999997Q 49.129251700680264 9.659999999999997 49.129251700680264 9.659999999999997L 57.67346938775509 9.659999999999997Q 57.67346938775509 9.659999999999997 57.67346938775509 9.659999999999997L 57.67346938775509 9.659999999999997L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 49.129251700680264 46L 49.129251700680264 9.659999999999997Q 49.129251700680264 9.659999999999997 49.129251700680264 9.659999999999997L 57.67346938775509 9.659999999999997Q 57.67346938775509 9.659999999999997 57.67346938775509 9.659999999999997L 57.67346938775509 9.659999999999997L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                pathFrom="M 49.129251700680264 46L 49.129251700680264 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 49.129251700680264 46"
                                                                                cy="9.659999999999997" cx="57.67346938775509"
                                                                                j="5" val="79" barHeight="36.34"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5420"
                                                                                d="M 59.8095238095238 46L 59.8095238095238 6.439999999999998Q 59.8095238095238 6.439999999999998 59.8095238095238 6.439999999999998L 68.35374149659863 6.439999999999998Q 68.35374149659863 6.439999999999998 68.35374149659863 6.439999999999998L 68.35374149659863 6.439999999999998L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 59.8095238095238 46L 59.8095238095238 6.439999999999998Q 59.8095238095238 6.439999999999998 59.8095238095238 6.439999999999998L 68.35374149659863 6.439999999999998Q 68.35374149659863 6.439999999999998 68.35374149659863 6.439999999999998L 68.35374149659863 6.439999999999998L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                pathFrom="M 59.8095238095238 46L 59.8095238095238 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 59.8095238095238 46"
                                                                                cy="6.439999999999998" cx="68.35374149659863"
                                                                                j="6" val="86" barHeight="39.56"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5422"
                                                                                d="M 70.48979591836735 46L 70.48979591836735 30.82Q 70.48979591836735 30.82 70.48979591836735 30.82L 79.03401360544218 30.82Q 79.03401360544218 30.82 79.03401360544218 30.82L 79.03401360544218 30.82L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMaskex6anzx6)"
                                                                                pathTo="M 70.48979591836735 46L 70.48979591836735 30.82Q 70.48979591836735 30.82 70.48979591836735 30.82L 79.03401360544218 30.82Q 79.03401360544218 30.82 79.03401360544218 30.82L 79.03401360544218 30.82L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                pathFrom="M 70.48979591836735 46L 70.48979591836735 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 70.48979591836735 46"
                                                                                cy="30.82" cx="79.03401360544218" j="7"
                                                                                val="33" barHeight="15.180000000000001"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <g id="SvgjsG5406" class="apexcharts-bar-goals-markers"
                                                                                style="pointer-events: none">
                                                                                <g id="SvgjsG5407"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5409"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5411"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5413"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5415"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5417"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5419"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5421"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                            </g>
                                                                        </g>
                                                                        <g id="SvgjsG5405" class="apexcharts-datalabels"
                                                                            data:realIndex="0"></g>
                                                                    </g>
                                                                    <line id="SvgjsLine5443" x1="-12.619047619047617" y1="0"
                                                                        x2="87.38095238095238" y2="0" stroke="#b6b6b6"
                                                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs"></line>
                                                                    <line id="SvgjsLine5444" x1="-12.619047619047617" y1="0"
                                                                        x2="87.38095238095238" y2="0" stroke-dasharray="0"
                                                                        stroke-width="0" stroke-linecap="butt"
                                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                                    <g id="SvgjsG5445" class="apexcharts-yaxis-annotations"></g>
                                                                    <g id="SvgjsG5446" class="apexcharts-xaxis-annotations"></g>
                                                                    <g id="SvgjsG5447" class="apexcharts-point-annotations"></g>
                                                                </g>
                                                                <rect id="SvgjsRect5399" width="0" height="0"
                                                                    x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"></rect>
                                                                <g id="SvgjsG5431" class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-18, 0)"></g>
                                                                <g id="SvgjsG5393" class="apexcharts-annotations"></g>
                                                            </svg>
                                                            <div class="apexcharts-legend" style="max-height: 23px;"></div>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgb(59, 130, 246);"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0">
                                        <div class="px-4 py-6 sm:p-6">
                                            <div class="flex items-center justify-between">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Tổng khách hàng</dt>
                                                    <dd class="mt-1 text-3xl font-semibold text-blue-600">{{$order}}</dd>
                                                </dl>
                                                <div class="md:hidden lg:block">
                                                    <div x-ref="chartElement" style="min-height: 46px;">
                                                        <div id="apexchartstmcmnj4b"
                                                            class="apexcharts-canvas apexchartstmcmnj4b apexcharts-theme-light"
                                                            style="width: 100px; height: 46px;"><svg id="SvgjsSvg5448" width="100"
                                                                height="46" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                                style="background: transparent;">
                                                                <g id="SvgjsG5450" class="apexcharts-inner apexcharts-graphical"
                                                                    transform="translate(16.619047619047617, 0)">
                                                                    <defs id="SvgjsDefs5449">
                                                                        <linearGradient id="SvgjsLinearGradient5453" x1="0"
                                                                            y1="0" x2="0" y2="1">
                                                                            <stop id="SvgjsStop5454" stop-opacity="0.4"
                                                                                stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5455" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                            <stop id="SvgjsStop5456" stop-opacity="0.5"
                                                                                stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                            </stop>
                                                                        </linearGradient>
                                                                        <clipPath id="gridRectMasktmcmnj4b">
                                                                            <rect id="SvgjsRect5459" width="104" height="46"
                                                                                x="-14.619047619047617" y="0" rx="0"
                                                                                ry="0" opacity="1" stroke-width="0"
                                                                                stroke="none" stroke-dasharray="0" fill="#fff">
                                                                            </rect>
                                                                        </clipPath>
                                                                        <clipPath id="forecastMasktmcmnj4b"></clipPath>
                                                                        <clipPath id="nonForecastMasktmcmnj4b"></clipPath>
                                                                        <clipPath id="gridRectMarkerMasktmcmnj4b">
                                                                            <rect id="SvgjsRect5460" width="78.76190476190476"
                                                                                height="50" x="-2" y="-2"
                                                                                rx="0" ry="0" opacity="1"
                                                                                stroke-width="0" stroke="none" stroke-dasharray="0"
                                                                                fill="#fff"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <line id="SvgjsLine5458" x1="9.2279052734375" y1="0"
                                                                        x2="9.2279052734375" y2="46" stroke-dasharray="3"
                                                                        stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                        x="9.2279052734375" y="0" width="1"
                                                                        height="46" fill="url(#SvgjsLinearGradient5453)"
                                                                        filter="none" fill-opacity="0.9" stroke-width="0"></line>
                                                                    <g id="SvgjsG5481" class="apexcharts-xaxis"
                                                                        transform="translate(0, 0)">
                                                                        <g id="SvgjsG5482" class="apexcharts-xaxis-texts-g"
                                                                            transform="translate(0, -4)"></g>
                                                                    </g>
                                                                    <g id="SvgjsG5490" class="apexcharts-grid">
                                                                        <g id="SvgjsG5491" class="apexcharts-gridlines-horizontal"
                                                                            style="display: none;">
                                                                            <line id="SvgjsLine5493" x1="-12.619047619047617"
                                                                                y1="0" x2="87.38095238095238" y2="0"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5494" x1="-12.619047619047617"
                                                                                y1="11.5" x2="87.38095238095238" y2="11.5"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5495" x1="-12.619047619047617"
                                                                                y1="23" x2="87.38095238095238" y2="23"
                                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                                            </line>
                                                                            <line id="SvgjsLine5496" x1="-12.619047619047617"
                                                                                y1="34.5" x2="87.38095238095238"
                                                                                y2="34.5" stroke="#e0e0e0"
                                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                            <line id="SvgjsLine5497" x1="-12.619047619047617"
                                                                                y1="46" x2="87.38095238095238"
                                                                                y2="46" stroke="#e0e0e0"
                                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                                class="apexcharts-gridline"></line>
                                                                        </g>
                                                                        <g id="SvgjsG5492" class="apexcharts-gridlines-vertical"
                                                                            style="display: none;"></g>
                                                                        <line id="SvgjsLine5499" x1="0" y1="46"
                                                                            x2="74.76190476190476" y2="46"
                                                                            stroke="transparent" stroke-dasharray="0"
                                                                            stroke-linecap="butt"></line>
                                                                        <line id="SvgjsLine5498" x1="0" y1="1"
                                                                            x2="0" y2="46" stroke="transparent"
                                                                            stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                    </g>
                                                                    <g id="SvgjsG5461"
                                                                        class="apexcharts-bar-series apexcharts-plot-series">
                                                                        <g id="SvgjsG5462" class="apexcharts-series"
                                                                            rel="1" seriesName="Orders" data:realIndex="0">
                                                                            <path id="SvgjsPath5466"
                                                                                d="M -4.272108843537415 46L -4.272108843537415 26.833333333333332Q -4.272108843537415 26.833333333333332 -4.272108843537415 26.833333333333332L 4.272108843537415 26.833333333333332Q 4.272108843537415 26.833333333333332 4.272108843537415 26.833333333333332L 4.272108843537415 26.833333333333332L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M -4.272108843537415 46L -4.272108843537415 26.833333333333332Q -4.272108843537415 26.833333333333332 -4.272108843537415 26.833333333333332L 4.272108843537415 26.833333333333332Q 4.272108843537415 26.833333333333332 4.272108843537415 26.833333333333332L 4.272108843537415 26.833333333333332L 4.272108843537415 46L 4.272108843537415 46z"
                                                                                pathFrom="M -4.272108843537415 46L -4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L 4.272108843537415 46L -4.272108843537415 46"
                                                                                cy="26.833333333333332" cx="4.272108843537415"
                                                                                j="0" val="5"
                                                                                barHeight="19.166666666666668"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5468"
                                                                                d="M 6.408163265306122 46L 6.408163265306122 7.666666666666664Q 6.408163265306122 7.666666666666664 6.408163265306122 7.666666666666664L 14.952380952380953 7.666666666666664Q 14.952380952380953 7.666666666666664 14.952380952380953 7.666666666666664L 14.952380952380953 7.666666666666664L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 6.408163265306122 46L 6.408163265306122 7.666666666666664Q 6.408163265306122 7.666666666666664 6.408163265306122 7.666666666666664L 14.952380952380953 7.666666666666664Q 14.952380952380953 7.666666666666664 14.952380952380953 7.666666666666664L 14.952380952380953 7.666666666666664L 14.952380952380953 46L 14.952380952380953 46z"
                                                                                pathFrom="M 6.408163265306122 46L 6.408163265306122 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 14.952380952380953 46L 6.408163265306122 46"
                                                                                cy="7.666666666666664" cx="14.952380952380953"
                                                                                j="1" val="10"
                                                                                barHeight="38.333333333333336"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5470"
                                                                                d="M 17.08843537414966 46L 17.08843537414966 26.833333333333332Q 17.08843537414966 26.833333333333332 17.08843537414966 26.833333333333332L 25.63265306122449 26.833333333333332Q 25.63265306122449 26.833333333333332 25.63265306122449 26.833333333333332L 25.63265306122449 26.833333333333332L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 17.08843537414966 46L 17.08843537414966 26.833333333333332Q 17.08843537414966 26.833333333333332 17.08843537414966 26.833333333333332L 25.63265306122449 26.833333333333332Q 25.63265306122449 26.833333333333332 25.63265306122449 26.833333333333332L 25.63265306122449 26.833333333333332L 25.63265306122449 46L 25.63265306122449 46z"
                                                                                pathFrom="M 17.08843537414966 46L 17.08843537414966 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 25.63265306122449 46L 17.08843537414966 46"
                                                                                cy="26.833333333333332" cx="25.63265306122449"
                                                                                j="2" val="5"
                                                                                barHeight="19.166666666666668"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5472"
                                                                                d="M 27.768707482993193 46L 27.768707482993193 34.5Q 27.768707482993193 34.5 27.768707482993193 34.5L 36.31292517006803 34.5Q 36.31292517006803 34.5 36.31292517006803 34.5L 36.31292517006803 34.5L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 27.768707482993193 46L 27.768707482993193 34.5Q 27.768707482993193 34.5 27.768707482993193 34.5L 36.31292517006803 34.5Q 36.31292517006803 34.5 36.31292517006803 34.5L 36.31292517006803 34.5L 36.31292517006803 46L 36.31292517006803 46z"
                                                                                pathFrom="M 27.768707482993193 46L 27.768707482993193 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 36.31292517006803 46L 27.768707482993193 46"
                                                                                cy="34.5" cx="36.31292517006803"
                                                                                j="3" val="3" barHeight="11.5"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5474"
                                                                                d="M 38.44897959183673 46L 38.44897959183673 26.833333333333332Q 38.44897959183673 26.833333333333332 38.44897959183673 26.833333333333332L 46.993197278911566 26.833333333333332Q 46.993197278911566 26.833333333333332 46.993197278911566 26.833333333333332L 46.993197278911566 26.833333333333332L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 38.44897959183673 46L 38.44897959183673 26.833333333333332Q 38.44897959183673 26.833333333333332 38.44897959183673 26.833333333333332L 46.993197278911566 26.833333333333332Q 46.993197278911566 26.833333333333332 46.993197278911566 26.833333333333332L 46.993197278911566 26.833333333333332L 46.993197278911566 46L 46.993197278911566 46z"
                                                                                pathFrom="M 38.44897959183673 46L 38.44897959183673 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 46.993197278911566 46L 38.44897959183673 46"
                                                                                cy="26.833333333333332" cx="46.993197278911566"
                                                                                j="4" val="5"
                                                                                barHeight="19.166666666666668"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5476"
                                                                                d="M 49.129251700680264 46L 49.129251700680264 46Q 49.129251700680264 46 49.129251700680264 46L 57.67346938775509 46Q 57.67346938775509 46 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 49.129251700680264 46L 49.129251700680264 46Q 49.129251700680264 46 49.129251700680264 46L 57.67346938775509 46Q 57.67346938775509 46 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46z"
                                                                                pathFrom="M 49.129251700680264 46L 49.129251700680264 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 57.67346938775509 46L 49.129251700680264 46"
                                                                                cy="46" cx="57.67346938775509"
                                                                                j="5" val="0" barHeight="0"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5478"
                                                                                d="M 59.8095238095238 46L 59.8095238095238 19.166666666666664Q 59.8095238095238 19.166666666666664 59.8095238095238 19.166666666666664L 68.35374149659863 19.166666666666664Q 68.35374149659863 19.166666666666664 68.35374149659863 19.166666666666664L 68.35374149659863 19.166666666666664L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 59.8095238095238 46L 59.8095238095238 19.166666666666664Q 59.8095238095238 19.166666666666664 59.8095238095238 19.166666666666664L 68.35374149659863 19.166666666666664Q 68.35374149659863 19.166666666666664 68.35374149659863 19.166666666666664L 68.35374149659863 19.166666666666664L 68.35374149659863 46L 68.35374149659863 46z"
                                                                                pathFrom="M 59.8095238095238 46L 59.8095238095238 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 68.35374149659863 46L 59.8095238095238 46"
                                                                                cy="19.166666666666664" cx="68.35374149659863"
                                                                                j="6" val="7"
                                                                                barHeight="26.833333333333336"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <path id="SvgjsPath5480"
                                                                                d="M 70.48979591836735 46L 70.48979591836735 30.666666666666664Q 70.48979591836735 30.666666666666664 70.48979591836735 30.666666666666664L 79.03401360544218 30.666666666666664Q 79.03401360544218 30.666666666666664 79.03401360544218 30.666666666666664L 79.03401360544218 30.666666666666664L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                fill="rgba(59,130,246,0.85)" fill-opacity="1"
                                                                                stroke-opacity="1" stroke-linecap="round"
                                                                                stroke-width="0" stroke-dasharray="0"
                                                                                class="apexcharts-bar-area" index="0"
                                                                                clip-path="url(#gridRectMasktmcmnj4b)"
                                                                                pathTo="M 70.48979591836735 46L 70.48979591836735 30.666666666666664Q 70.48979591836735 30.666666666666664 70.48979591836735 30.666666666666664L 79.03401360544218 30.666666666666664Q 79.03401360544218 30.666666666666664 79.03401360544218 30.666666666666664L 79.03401360544218 30.666666666666664L 79.03401360544218 46L 79.03401360544218 46z"
                                                                                pathFrom="M 70.48979591836735 46L 70.48979591836735 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 79.03401360544218 46L 70.48979591836735 46"
                                                                                cy="30.666666666666664" cx="79.03401360544218"
                                                                                j="7" val="4"
                                                                                barHeight="15.333333333333334"
                                                                                barWidth="8.54421768707483"></path>
                                                                            <g id="SvgjsG5464" class="apexcharts-bar-goals-markers"
                                                                                style="pointer-events: none">
                                                                                <g id="SvgjsG5465"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5467"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5469"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5471"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5473"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5475"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5477"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                                <g id="SvgjsG5479"
                                                                                    className="apexcharts-bar-goals-groups"></g>
                                                                            </g>
                                                                        </g>
                                                                        <g id="SvgjsG5463" class="apexcharts-datalabels"
                                                                            data:realIndex="0"></g>
                                                                    </g>
                                                                    <line id="SvgjsLine5500" x1="-12.619047619047617"
                                                                        y1="0" x2="87.38095238095238" y2="0"
                                                                        stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                                    <line id="SvgjsLine5501" x1="-12.619047619047617"
                                                                        y1="0" x2="87.38095238095238" y2="0"
                                                                        stroke-dasharray="0" stroke-width="0"
                                                                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                                                    </line>
                                                                    <g id="SvgjsG5502" class="apexcharts-yaxis-annotations"></g>
                                                                    <g id="SvgjsG5503" class="apexcharts-xaxis-annotations"></g>
                                                                    <g id="SvgjsG5504" class="apexcharts-point-annotations"></g>
                                                                </g>
                                                                <rect id="SvgjsRect5457" width="0" height="0"
                                                                    x="0" y="0" rx="0" ry="0"
                                                                    opacity="1" stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fefefe"></rect>
                                                                <g id="SvgjsG5489" class="apexcharts-yaxis" rel="0"
                                                                    transform="translate(-18, 0)"></g>
                                                                <g id="SvgjsG5451" class="apexcharts-annotations"></g>
                                                            </svg>
                                                            <div class="apexcharts-legend" style="max-height: 23px;"></div>
                                                            <div class="apexcharts-tooltip apexcharts-theme-light"
                                                                style="left: 26.347px; top: 0px;">
                                                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                                    style="order: 1; display: flex;"><span
                                                                        class="apexcharts-tooltip-marker"
                                                                        style="background-color: rgba(59, 130, 246, 0.85); display: none;"></span>
                                                                    <div class="apexcharts-tooltip-text"
                                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                                class="apexcharts-tooltip-text-y-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                                        </div>
                                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                                <div class="apexcharts-yaxistooltip-text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                
                
                                <div class="mt-5 grid grid-cols-1 xl:grid-cols-2 gap-5">
                                    <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0">
                                        <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Đơn đặt hàng gần nhất
                                            </h3>
                                        </div>
                                        <div class="px-4 py-6 sm:p-6">
                                            <div class="-mx-4 -my-6 sm:-m-6">
                                                <div class="overflow-x-auto">
                                                    <div class="inline-block min-w-full align-middle">
                                                        <table class="min-w-full divide-y divide-slate-200">
                                                            <thead class="bg-slate-50">
                                                                <tr>
                                                                    <th
                                                                        class="py-3.5 px-4 sm:pl-6 font-medium text-left text-xs text-gray-500 tracking-wider uppercase">
                                                                        ID
                                                                    </th>
                                                                    <th
                                                                        class="py-3.5 px-4 font-medium text-left text-xs text-gray-500 tracking-wider uppercase">
                                                                        Tên
                                                                    </th>
                                                                    <th
                                                                        class="py-3.5 px-4 font-medium text-right text-xs text-gray-500 tracking-wider uppercase">
                                                                        Tổng
                                                                    </th>
                                                                    <th
                                                                        class="py-3.5 px-4 sm:pr-6 font-medium text-right text-xs text-gray-500 tracking-wider uppercase">
                                                                        Ngày
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-gray-200">
                                                                @foreach($newOrder as $item)
                                                                <tr>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 sm:px-6 text-sm font-medium text-gray-900">
                                                                        <a href="https://demo.cartify.dev/admin/orders/1437"
                                                                            class="hover:text-blue-700">
                                                                            {{$item->id}}
                                                                        </a>
                                                                    </td>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 text-sm font-medium text-gray-900">
                                                                        <a href="https://demo.cartify.dev/admin/customers/59"
                                                                            class="hover:text-blue-700">
                                                                            {{$item->name}}
                                                                        </a>
                                                                    </td>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 text-sm text-gray-900 text-right tabular-nums">
                                                                        {{$item->amount}}
                                                                    </td>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 sm:pr-6 text-sm text-gray-900 text-right tabular-nums">
                                                                        {{$item->created_at->format('d-m-Y')}}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0">
                                        <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Danh sách nhân viên
                                            </h3>
                                        </div>
                                        <div class="px-4 py-6 sm:p-6">
                                            <div class="-mx-4 -my-6 sm:-m-6">
                                                <div class="overflow-x-auto">
                                                    <div class="inline-block min-w-full align-middle">
                                                        <table class="min-w-full divide-y divide-slate-200">
                                                            <thead class="bg-slate-50">
                                                                <tr>
                                                                    <th
                                                                        class="py-3.5 px-4 sm:pl-6 font-medium text-left text-xs text-gray-500 tracking-wider uppercase">
                                                                        Tên
                                                                    </th>
                                                                    <th
                                                                        class="py-3.5 px-4 sm:pr-6 font-medium text-right text-xs text-gray-500 tracking-wider uppercase">
                                                                        Chức vụ
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-gray-200">
                                                                @foreach($list_staff as $item)
                                                                <tr>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 sm:pl-6 font-medium text-sm text-gray-900">
                                                                        <a href="https://demo.cartify.dev/admin/products/womens-thatcher-boot"
                                                                            class="hover:text-blue-700">
                                                                            {{$item->name}}
                                                                        </a>
                                                                    </td>
                                                                    <td
                                                                        class="whitespace-nowrap py-4 px-4 sm:px-6 text-sm text-gray-900 text-right tabular-nums">
                                                                        @if($item->is_staff)
                                                                            Nhân viên
                                                                        @else
                                                                        Quản lí
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Livewire Component wire-end:XyQVY3JZmlJG1MaiWH9t -->
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
    </div>
</x-app-layout>
