@extends('admin.layouts.index')
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-account-multiple widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Posts</h5>
                            <h3 class="mt-3 mb-3">{{$posts}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-cart-plus widget-icon bg-danger-lighten text-danger"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Users</h5>
                            <h3 class="mt-3 mb-3">{{$users}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-currency-usd widget-icon bg-info-lighten text-info"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">User subscribed</h5>
                            <h3 class="mt-3 mb-3">{{$userSubscribes}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-right">
                                <i class="mdi mdi-pulse widget-icon bg-warning-lighten text-warning"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0" title="Growth">Pending posts</h5>
                            <h3 class="mt-3 mb-3">{{$pendingPosts}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7  col-lg-6">
            <div class="card">
                <div class="card-body" style="position: relative;">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-3">Số bài đăng trong tháng</h4>

                    <div id="high-performing-product" class="apex-charts" data-colors="#fa6767,#e3eaef" style="min-height: 257px;">
                        <div id="apexcharts6ytkdriig" class="apexcharts-canvas apexcharts6ytkdriig apexcharts-theme-light" style="width: 791px; height: 257px;">
                            <svg id="SvgjsSvg1677" width="791" height="257" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG1679" class="apexcharts-inner apexcharts-graphical" transform="translate(40.79997253417969, 30)">
                                    <defs id="SvgjsDefs1678">
                                        <linearGradient id="SvgjsLinearGradient1683" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1684" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                            <stop id="SvgjsStop1685" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                            <stop id="SvgjsStop1686" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMask6ytkdriig">
                                            <rect id="SvgjsRect1688" width="756.2000274658203" height="188.112" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMask6ytkdriig">
                                            <rect id="SvgjsRect1689" width="754.2000274658203" height="190.112" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1687" width="12.503333791097004" height="186.112" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                          fill="url(#SvgjsLinearGradient1683)" class="apexcharts-xcrosshairs" y2="186.112" filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG1720" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1721" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                            <text id="SvgjsText1723" font-family="Helvetica, Arial, sans-serif" x="31.258334477742512" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1724">Jan</tspan>
                                                <title>Jan</title></text>
                                            <text id="SvgjsText1726" font-family="Helvetica, Arial, sans-serif" x="93.77500343322754" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1727">Feb</tspan>
                                                <title>Feb</title></text>
                                            <text id="SvgjsText1729" font-family="Helvetica, Arial, sans-serif" x="156.29167238871256" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1730">Mar</tspan>
                                                <title>Mar</title></text>
                                            <text id="SvgjsText1732" font-family="Helvetica, Arial, sans-serif" x="218.80834134419757" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1733">Apr</tspan>
                                                <title>Apr</title></text>
                                            <text id="SvgjsText1735" font-family="Helvetica, Arial, sans-serif" x="281.3250102996826" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1736">May</tspan>
                                                <title>May</title></text>
                                            <text id="SvgjsText1738" font-family="Helvetica, Arial, sans-serif" x="343.84167925516766" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1739">Jun</tspan>
                                                <title>Jun</title></text>
                                            <text id="SvgjsText1741" font-family="Helvetica, Arial, sans-serif" x="406.3583482106527" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1742">Jul</tspan>
                                                <title>Jul</title></text>
                                            <text id="SvgjsText1744" font-family="Helvetica, Arial, sans-serif" x="468.87501716613775" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1745">Aug</tspan>
                                                <title>Aug</title></text>
                                            <text id="SvgjsText1747" font-family="Helvetica, Arial, sans-serif" x="531.3916861216227" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1748">Sep</tspan>
                                                <title>Sep</title></text>
                                            <text id="SvgjsText1750" font-family="Helvetica, Arial, sans-serif" x="593.9083550771077" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1751">Oct</tspan>
                                                <title>Oct</title></text>
                                            <text id="SvgjsText1753" font-family="Helvetica, Arial, sans-serif" x="656.4250240325927" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1754">Nov</tspan>
                                                <title>Nov</title></text>
                                            <text id="SvgjsText1756" font-family="Helvetica, Arial, sans-serif" x="718.9416929880776" y="215.112" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1757">Dec</tspan>
                                                <title>Dec</title></text>
                                        </g>
                                    </g>
                                    <g id="SvgjsG1772" class="apexcharts-grid">
                                        <g id="SvgjsG1773" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1788" x1="0" y1="0" x2="750.2000274658203" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1789" x1="0" y1="37.2224" x2="750.2000274658203" y2="37.2224" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1790" x1="0" y1="74.4448" x2="750.2000274658203" y2="74.4448" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1791" x1="0" y1="111.66720000000001" x2="750.2000274658203" y2="111.66720000000001" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1792" x1="0" y1="148.8896" x2="750.2000274658203" y2="148.8896" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1793" x1="0" y1="186.112" x2="750.2000274658203" y2="186.112" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1774" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1775" x1="0" y1="187.112" x2="0" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1776" x1="62.516668955485024" y1="187.112" x2="62.516668955485024" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1777" x1="125.03333791097005" y1="187.112" x2="125.03333791097005" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1778" x1="187.55000686645508" y1="187.112" x2="187.55000686645508" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1779" x1="250.0666758219401" y1="187.112" x2="250.0666758219401" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1780" x1="312.5833447774251" y1="187.112" x2="312.5833447774251" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1781" x1="375.10001373291016" y1="187.112" x2="375.10001373291016" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1782" x1="437.6166826883952" y1="187.112" x2="437.6166826883952" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1783" x1="500.13335164388025" y1="187.112" x2="500.13335164388025" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1784" x1="562.6500205993652" y1="187.112" x2="562.6500205993652" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1785" x1="625.1666895548502" y1="187.112" x2="625.1666895548502" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1786" x1="687.6833585103352" y1="187.112" x2="687.6833585103352" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1787" x1="750.2000274658202" y1="187.112" x2="750.2000274658202" y2="193.112" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1795" x1="0" y1="186.112" x2="750.2000274658203" y2="186.112" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1794" x1="0" y1="1" x2="0" y2="186.112" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1691" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1692" class="apexcharts-series" seriesName="Actual" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1694"
                                                  d="M 25.00666758219401 186.112L 25.00666758219401 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 186.112L 35.51000137329101 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 25.00666758219401 186.112L 25.00666758219401 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 186.112L 35.51000137329101 186.112z"
                                                  pathFrom="M 25.00666758219401 186.112L 25.00666758219401 186.112L 35.51000137329101 186.112L 35.51000137329101 186.112L 35.51000137329101 186.112L 25.00666758219401 186.112"
                                                  cy="125.62559999999999" cx="86.52333653767903" j="0" val="65" barHeight="60.486399999999996" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1695"
                                                  d="M 87.52333653767903 186.112L 87.52333653767903 131.20896L 98.02667032877604 131.20896L 98.02667032877604 131.20896L 98.02667032877604 186.112L 98.02667032877604 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 87.52333653767903 186.112L 87.52333653767903 131.20896L 98.02667032877604 131.20896L 98.02667032877604 131.20896L 98.02667032877604 186.112L 98.02667032877604 186.112z"
                                                  pathFrom="M 87.52333653767903 186.112L 87.52333653767903 186.112L 98.02667032877604 186.112L 98.02667032877604 186.112L 98.02667032877604 186.112L 87.52333653767903 186.112"
                                                  cy="131.20896" cx="149.04000549316405" j="1" val="59" barHeight="54.90304" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1696"
                                                  d="M 150.04000549316405 186.112L 150.04000549316405 111.6672L 160.54333928426104 111.6672L 160.54333928426104 111.6672L 160.54333928426104 186.112L 160.54333928426104 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 150.04000549316405 186.112L 150.04000549316405 111.6672L 160.54333928426104 111.6672L 160.54333928426104 111.6672L 160.54333928426104 186.112L 160.54333928426104 186.112z"
                                                  pathFrom="M 150.04000549316405 186.112L 150.04000549316405 186.112L 160.54333928426104 186.112L 160.54333928426104 186.112L 160.54333928426104 186.112L 150.04000549316405 186.112"
                                                  cy="111.6672" cx="211.55667444864906" j="2" val="80" barHeight="74.4448" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1697"
                                                  d="M 212.55667444864906 186.112L 212.55667444864906 110.73664L 223.06000823974605 110.73664L 223.06000823974605 110.73664L 223.06000823974605 186.112L 223.06000823974605 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 212.55667444864906 186.112L 212.55667444864906 110.73664L 223.06000823974605 110.73664L 223.06000823974605 110.73664L 223.06000823974605 186.112L 223.06000823974605 186.112z"
                                                  pathFrom="M 212.55667444864906 186.112L 212.55667444864906 186.112L 223.06000823974605 186.112L 223.06000823974605 186.112L 223.06000823974605 186.112L 212.55667444864906 186.112"
                                                  cy="110.73664" cx="274.0733434041341" j="3" val="81" barHeight="75.37536" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1698"
                                                  d="M 275.0733434041341 186.112L 275.0733434041341 134.00064L 285.5766771952311 134.00064L 285.5766771952311 134.00064L 285.5766771952311 186.112L 285.5766771952311 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 275.0733434041341 186.112L 275.0733434041341 134.00064L 285.5766771952311 134.00064L 285.5766771952311 134.00064L 285.5766771952311 186.112L 285.5766771952311 186.112z"
                                                  pathFrom="M 275.0733434041341 186.112L 275.0733434041341 186.112L 285.5766771952311 186.112L 285.5766771952311 186.112L 285.5766771952311 186.112L 275.0733434041341 186.112"
                                                  cy="134.00064" cx="336.59001235961915" j="4" val="56" barHeight="52.11136" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1699"
                                                  d="M 337.59001235961915 186.112L 337.59001235961915 103.29216L 348.0933461507162 103.29216L 348.0933461507162 103.29216L 348.0933461507162 186.112L 348.0933461507162 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 337.59001235961915 186.112L 337.59001235961915 103.29216L 348.0933461507162 103.29216L 348.0933461507162 103.29216L 348.0933461507162 186.112L 348.0933461507162 186.112z"
                                                  pathFrom="M 337.59001235961915 186.112L 337.59001235961915 186.112L 348.0933461507162 186.112L 348.0933461507162 186.112L 348.0933461507162 186.112L 337.59001235961915 186.112"
                                                  cy="103.29216" cx="399.1066813151042" j="5" val="89" barHeight="82.81984" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1700"
                                                  d="M 400.1066813151042 186.112L 400.1066813151042 148.8896L 410.6100151062012 148.8896L 410.6100151062012 148.8896L 410.6100151062012 186.112L 410.6100151062012 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 400.1066813151042 186.112L 400.1066813151042 148.8896L 410.6100151062012 148.8896L 410.6100151062012 148.8896L 410.6100151062012 186.112L 410.6100151062012 186.112z"
                                                  pathFrom="M 400.1066813151042 186.112L 400.1066813151042 186.112L 410.6100151062012 186.112L 410.6100151062012 186.112L 410.6100151062012 186.112L 400.1066813151042 186.112"
                                                  cy="148.8896" cx="461.62335027058924" j="6" val="40" barHeight="37.2224" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1701"
                                                  d="M 462.62335027058924 186.112L 462.62335027058924 156.33408L 473.12668406168626 156.33408L 473.12668406168626 156.33408L 473.12668406168626 186.112L 473.12668406168626 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 462.62335027058924 186.112L 462.62335027058924 156.33408L 473.12668406168626 156.33408L 473.12668406168626 156.33408L 473.12668406168626 186.112L 473.12668406168626 186.112z"
                                                  pathFrom="M 462.62335027058924 186.112L 462.62335027058924 186.112L 473.12668406168626 186.112L 473.12668406168626 186.112L 473.12668406168626 186.112L 462.62335027058924 186.112"
                                                  cy="156.33408" cx="524.1400192260743" j="7" val="32" barHeight="29.777919999999998" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1702"
                                                  d="M 525.1400192260743 186.112L 525.1400192260743 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 186.112L 535.6433530171713 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 525.1400192260743 186.112L 525.1400192260743 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 186.112L 535.6433530171713 186.112z"
                                                  pathFrom="M 525.1400192260743 186.112L 525.1400192260743 186.112L 535.6433530171713 186.112L 535.6433530171713 186.112L 535.6433530171713 186.112L 525.1400192260743 186.112"
                                                  cy="125.62559999999999" cx="586.6566881815593" j="8" val="65" barHeight="60.486399999999996" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1703"
                                                  d="M 587.6566881815593 186.112L 587.6566881815593 131.20896L 598.1600219726563 131.20896L 598.1600219726563 131.20896L 598.1600219726563 186.112L 598.1600219726563 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 587.6566881815593 186.112L 587.6566881815593 131.20896L 598.1600219726563 131.20896L 598.1600219726563 131.20896L 598.1600219726563 186.112L 598.1600219726563 186.112z"
                                                  pathFrom="M 587.6566881815593 186.112L 587.6566881815593 186.112L 598.1600219726563 186.112L 598.1600219726563 186.112L 598.1600219726563 186.112L 587.6566881815593 186.112"
                                                  cy="131.20896" cx="649.1733571370443" j="9" val="59" barHeight="54.90304" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1704"
                                                  d="M 650.1733571370443 186.112L 650.1733571370443 111.6672L 660.6766909281413 111.6672L 660.6766909281413 111.6672L 660.6766909281413 186.112L 660.6766909281413 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 650.1733571370443 186.112L 650.1733571370443 111.6672L 660.6766909281413 111.6672L 660.6766909281413 111.6672L 660.6766909281413 186.112L 660.6766909281413 186.112z"
                                                  pathFrom="M 650.1733571370443 186.112L 650.1733571370443 186.112L 660.6766909281413 186.112L 660.6766909281413 186.112L 660.6766909281413 186.112L 650.1733571370443 186.112"
                                                  cy="111.6672" cx="711.6900260925293" j="10" val="80" barHeight="74.4448" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1705"
                                                  d="M 712.6900260925293 186.112L 712.6900260925293 110.73664L 723.1933598836263 110.73664L 723.1933598836263 110.73664L 723.1933598836263 186.112L 723.1933598836263 186.112z"
                                                  fill="rgba(250,103,103,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 712.6900260925293 186.112L 712.6900260925293 110.73664L 723.1933598836263 110.73664L 723.1933598836263 110.73664L 723.1933598836263 186.112L 723.1933598836263 186.112z"
                                                  pathFrom="M 712.6900260925293 186.112L 712.6900260925293 186.112L 723.1933598836263 186.112L 723.1933598836263 186.112L 723.1933598836263 186.112L 712.6900260925293 186.112"
                                                  cy="110.73664" cx="774.2066950480142" j="11" val="81" barHeight="75.37536" barWidth="12.503333791097004"></path>
                                        </g>
                                        <g id="SvgjsG1706" class="apexcharts-series" seriesName="Projection" rel="2" data:realIndex="1">
                                            <path id="SvgjsPath1708"
                                                  d="M 25.00666758219401 125.62559999999999L 25.00666758219401 42.80575999999999L 35.51000137329101 42.80575999999999L 35.51000137329101 42.80575999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 25.00666758219401 125.62559999999999L 25.00666758219401 42.80575999999999L 35.51000137329101 42.80575999999999L 35.51000137329101 42.80575999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999z"
                                                  pathFrom="M 25.00666758219401 125.62559999999999L 25.00666758219401 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999L 35.51000137329101 125.62559999999999L 25.00666758219401 125.62559999999999"
                                                  cy="42.80575999999999" cx="86.52333653767903" j="0" val="89" barHeight="82.81984" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1709"
                                                  d="M 87.52333653767903 131.20896L 87.52333653767903 93.98656L 98.02667032877604 93.98656L 98.02667032877604 93.98656L 98.02667032877604 131.20896L 98.02667032877604 131.20896z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 87.52333653767903 131.20896L 87.52333653767903 93.98656L 98.02667032877604 93.98656L 98.02667032877604 93.98656L 98.02667032877604 131.20896L 98.02667032877604 131.20896z"
                                                  pathFrom="M 87.52333653767903 131.20896L 87.52333653767903 131.20896L 98.02667032877604 131.20896L 98.02667032877604 131.20896L 98.02667032877604 131.20896L 87.52333653767903 131.20896"
                                                  cy="93.98656" cx="149.04000549316405" j="1" val="40" barHeight="37.2224" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1710"
                                                  d="M 150.04000549316405 111.6672L 150.04000549316405 81.88928L 160.54333928426104 81.88928L 160.54333928426104 81.88928L 160.54333928426104 111.6672L 160.54333928426104 111.6672z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 150.04000549316405 111.6672L 150.04000549316405 81.88928L 160.54333928426104 81.88928L 160.54333928426104 81.88928L 160.54333928426104 111.6672L 160.54333928426104 111.6672z"
                                                  pathFrom="M 150.04000549316405 111.6672L 150.04000549316405 111.6672L 160.54333928426104 111.6672L 160.54333928426104 111.6672L 160.54333928426104 111.6672L 150.04000549316405 111.6672"
                                                  cy="81.88928" cx="211.55667444864906" j="2" val="32" barHeight="29.777919999999998" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1711"
                                                  d="M 212.55667444864906 110.73664L 212.55667444864906 50.25024L 223.06000823974605 50.25024L 223.06000823974605 50.25024L 223.06000823974605 110.73664L 223.06000823974605 110.73664z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 212.55667444864906 110.73664L 212.55667444864906 50.25024L 223.06000823974605 50.25024L 223.06000823974605 50.25024L 223.06000823974605 110.73664L 223.06000823974605 110.73664z"
                                                  pathFrom="M 212.55667444864906 110.73664L 212.55667444864906 110.73664L 223.06000823974605 110.73664L 223.06000823974605 110.73664L 223.06000823974605 110.73664L 212.55667444864906 110.73664"
                                                  cy="50.25024" cx="274.0733434041341" j="3" val="65" barHeight="60.486399999999996" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1712"
                                                  d="M 275.0733434041341 134.00064L 275.0733434041341 79.0976L 285.5766771952311 79.0976L 285.5766771952311 79.0976L 285.5766771952311 134.00064L 285.5766771952311 134.00064z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 275.0733434041341 134.00064L 275.0733434041341 79.0976L 285.5766771952311 79.0976L 285.5766771952311 79.0976L 285.5766771952311 134.00064L 285.5766771952311 134.00064z"
                                                  pathFrom="M 275.0733434041341 134.00064L 275.0733434041341 134.00064L 285.5766771952311 134.00064L 285.5766771952311 134.00064L 285.5766771952311 134.00064L 275.0733434041341 134.00064"
                                                  cy="79.0976" cx="336.59001235961915" j="4" val="59" barHeight="54.90304" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1713"
                                                  d="M 337.59001235961915 103.29216L 337.59001235961915 28.847359999999995L 348.0933461507162 28.847359999999995L 348.0933461507162 28.847359999999995L 348.0933461507162 103.29216L 348.0933461507162 103.29216z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 337.59001235961915 103.29216L 337.59001235961915 28.847359999999995L 348.0933461507162 28.847359999999995L 348.0933461507162 28.847359999999995L 348.0933461507162 103.29216L 348.0933461507162 103.29216z"
                                                  pathFrom="M 337.59001235961915 103.29216L 337.59001235961915 103.29216L 348.0933461507162 103.29216L 348.0933461507162 103.29216L 348.0933461507162 103.29216L 337.59001235961915 103.29216"
                                                  cy="28.847359999999995" cx="399.1066813151042" j="5" val="80" barHeight="74.4448" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1714"
                                                  d="M 400.1066813151042 148.8896L 400.1066813151042 73.51424L 410.6100151062012 73.51424L 410.6100151062012 73.51424L 410.6100151062012 148.8896L 410.6100151062012 148.8896z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 400.1066813151042 148.8896L 400.1066813151042 73.51424L 410.6100151062012 73.51424L 410.6100151062012 73.51424L 410.6100151062012 148.8896L 410.6100151062012 148.8896z"
                                                  pathFrom="M 400.1066813151042 148.8896L 400.1066813151042 148.8896L 410.6100151062012 148.8896L 410.6100151062012 148.8896L 410.6100151062012 148.8896L 400.1066813151042 148.8896"
                                                  cy="73.51424" cx="461.62335027058924" j="6" val="81" barHeight="75.37536" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1715"
                                                  d="M 462.62335027058924 156.33408L 462.62335027058924 104.22272000000001L 473.12668406168626 104.22272000000001L 473.12668406168626 104.22272000000001L 473.12668406168626 156.33408L 473.12668406168626 156.33408z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 462.62335027058924 156.33408L 462.62335027058924 104.22272000000001L 473.12668406168626 104.22272000000001L 473.12668406168626 104.22272000000001L 473.12668406168626 156.33408L 473.12668406168626 156.33408z"
                                                  pathFrom="M 462.62335027058924 156.33408L 462.62335027058924 156.33408L 473.12668406168626 156.33408L 473.12668406168626 156.33408L 473.12668406168626 156.33408L 462.62335027058924 156.33408"
                                                  cy="104.22272000000001" cx="524.1400192260743" j="7" val="56" barHeight="52.11136" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1716"
                                                  d="M 525.1400192260743 125.62559999999999L 525.1400192260743 42.80575999999999L 535.6433530171713 42.80575999999999L 535.6433530171713 42.80575999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 525.1400192260743 125.62559999999999L 525.1400192260743 42.80575999999999L 535.6433530171713 42.80575999999999L 535.6433530171713 42.80575999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999z"
                                                  pathFrom="M 525.1400192260743 125.62559999999999L 525.1400192260743 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999L 535.6433530171713 125.62559999999999L 525.1400192260743 125.62559999999999"
                                                  cy="42.80575999999999" cx="586.6566881815593" j="8" val="89" barHeight="82.81984" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1717"
                                                  d="M 587.6566881815593 131.20896L 587.6566881815593 93.98656L 598.1600219726563 93.98656L 598.1600219726563 93.98656L 598.1600219726563 131.20896L 598.1600219726563 131.20896z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 587.6566881815593 131.20896L 587.6566881815593 93.98656L 598.1600219726563 93.98656L 598.1600219726563 93.98656L 598.1600219726563 131.20896L 598.1600219726563 131.20896z"
                                                  pathFrom="M 587.6566881815593 131.20896L 587.6566881815593 131.20896L 598.1600219726563 131.20896L 598.1600219726563 131.20896L 598.1600219726563 131.20896L 587.6566881815593 131.20896"
                                                  cy="93.98656" cx="649.1733571370443" j="9" val="40" barHeight="37.2224" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1718"
                                                  d="M 650.1733571370443 111.6672L 650.1733571370443 51.1808L 660.6766909281413 51.1808L 660.6766909281413 51.1808L 660.6766909281413 111.6672L 660.6766909281413 111.6672z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 650.1733571370443 111.6672L 650.1733571370443 51.1808L 660.6766909281413 51.1808L 660.6766909281413 51.1808L 660.6766909281413 111.6672L 660.6766909281413 111.6672z"
                                                  pathFrom="M 650.1733571370443 111.6672L 650.1733571370443 111.6672L 660.6766909281413 111.6672L 660.6766909281413 111.6672L 660.6766909281413 111.6672L 650.1733571370443 111.6672"
                                                  cy="51.1808" cx="711.6900260925293" j="10" val="65" barHeight="60.486399999999996" barWidth="12.503333791097004"></path>
                                            <path id="SvgjsPath1719"
                                                  d="M 712.6900260925293 110.73664L 712.6900260925293 55.8336L 723.1933598836263 55.8336L 723.1933598836263 55.8336L 723.1933598836263 110.73664L 723.1933598836263 110.73664z"
                                                  fill="rgba(227,234,239,1)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="square" stroke-width="2" stroke-dasharray="0"
                                                  class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMask6ytkdriig)"
                                                  pathTo="M 712.6900260925293 110.73664L 712.6900260925293 55.8336L 723.1933598836263 55.8336L 723.1933598836263 55.8336L 723.1933598836263 110.73664L 723.1933598836263 110.73664z"
                                                  pathFrom="M 712.6900260925293 110.73664L 712.6900260925293 110.73664L 723.1933598836263 110.73664L 723.1933598836263 110.73664L 723.1933598836263 110.73664L 712.6900260925293 110.73664"
                                                  cy="55.8336" cx="774.2066950480142" j="11" val="59" barHeight="54.90304" barWidth="12.503333791097004"></path>
                                            <g id="SvgjsG1707" class="apexcharts-datalabels" data:realIndex="1"></g>
                                        </g>
                                        <g id="SvgjsG1693" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1796" x1="0" y1="0" x2="750.2000274658203" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1797" x1="0" y1="0" x2="750.2000274658203" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1798" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1799" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1800" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1758" class="apexcharts-yaxis" rel="0" transform="translate(7.7999725341796875, 0)">
                                    <g id="SvgjsG1759" class="apexcharts-yaxis-texts-g">
                                        <text id="SvgjsText1760" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1761">200k</tspan>
                                        </text>
                                        <text id="SvgjsText1762" font-family="Helvetica, Arial, sans-serif" x="20" y="68.7224" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1763">160k</tspan>
                                        </text>
                                        <text id="SvgjsText1764" font-family="Helvetica, Arial, sans-serif" x="20" y="105.94479999999999" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1765">120k</tspan>
                                        </text>
                                        <text id="SvgjsText1766" font-family="Helvetica, Arial, sans-serif" x="20" y="143.16719999999998" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1767">80k</tspan>
                                        </text>
                                        <text id="SvgjsText1768" font-family="Helvetica, Arial, sans-serif" x="20" y="180.38959999999997" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1769">40k</tspan>
                                        </text>
                                        <text id="SvgjsText1770" font-family="Helvetica, Arial, sans-serif" x="20" y="217.61199999999997" text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1771">0k</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g id="SvgjsG1680" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(250, 103, 103);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(227, 234, 239);"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>

                    <!-- <div style="height: 263px;" class="chartjs-chart">
                        <canvas id="high-performing-product"></canvas>
                    </div> -->
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 840px; height: 346px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
@endsection
