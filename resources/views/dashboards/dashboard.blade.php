@section('title', ' Dashboard Analyse')
<x-app-layout :assets="$assets ?? []">
   
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
               <ul  class="swiper-wrapper list-inline m-0 p-0 mb-2">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-01" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                              <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Total Consombale</p>
                              <h4 class="counter" style="visibility: visible;">{{ $totalConsomable }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                              <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Total Imobilisable</p>
                              <h4 class="counter">{{ $totaImobilisable }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                     <div class="card-body">
                        <div class="progress-widget">
                           <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                              <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                 <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                              </svg>
                           </div>
                           <div class="progress-detail">
                              <p  class="mb-2">Total suivre_sucrete</p>
                              <h4 class="counter">{{ $totalSuivre_sucrete }}</h4>
                           </div>
                        </div>
                     </div>
                  </li>
                  
               </ul>
               <div class="swiper-button swiper-button-next"></div>
               <div class="swiper-button swiper-button-prev"></div>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-lg-8">
         <div class="row">
            <div class="col-md-12">
         
               <div class="card" data-aos="fade-up" data-aos-delay="1200">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Conversions</h4>
                     </div>
                     <div class="dropdown">
                        <p class="dropdown-item text-gray " >par Annnee</p>
   
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-activity" class="d-activity"></div>
                  </div>
               </div>
            </div>
            
            
         </div>
      </div>
      <div class="col-md-12 col-lg-4">
         <div class="row">
            <div class="col-md-6 col-lg-12">
               <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">suivre ucrete consombale</p>
                           <h4 class="counter">{{ $Suivre_sucreteConsomable }}</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-12">
               <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                           <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">suivre ucrete Imobilisable</p>
                           <h4 class="counter">{{ $Suivre_sucreteImobilisable }}</h4>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
<script>
   if (document.querySelectorAll('#d-activity').length) {
       const options = {
           series: [
               {
                   name: 'Consomable',
                   data: [
                       @foreach($counts_by_month as $month => $counts)
                           {{ $counts['consomable'] }},
                       @endforeach
                   ],
               },
               {
                   name: 'Imobilisable',
                   data: [
                       @foreach($counts_by_month as $month => $counts)
                           {{ $counts['imobilisable'] }},
                       @endforeach
                   ]
               }
           ],
           chart: {
               type: 'bar',
               height: 230,
               stacked: true,
               toolbar: {
                   show: false
               }
           },
           colors: ["#3a57e8", "#4bc7d2"],
           plotOptions: {
               bar: {
                   horizontal: false,
                   columnWidth: '28%',
                   endingShape: 'rounded',
                   borderRadius: 5,
               },
           },
           legend: {
               show: true,
               position: 'top'
           },
           dataLabels: {
               enabled: false
           },
           stroke: {
               show: true,
               width: 2,
               colors: ['transparent']
           },
           xaxis: {
               categories: [
                   @foreach($counts_by_month as $month => $counts)
                       '{{ $month }}',
                   @endforeach
               ],
               labels: {
                   minHeight: 20,
                   maxHeight: 20,
                   style: {
                       colors: "#8A92A6",
                   },
               }
           },
           yaxis: {
               title: {
                   text: ''
               },
               labels: {
                   minWidth: 19,
                   maxWidth: 19,
                   style: {
                       colors: "#8A92A6",
                   },
               }
           },
           fill: {
               opacity: 1
           },
           tooltip: {
               y: {
                   formatter: function (val) {
                       return  val
                   }
               }
           }
       };

       const chart = new ApexCharts(document.querySelector("#d-activity"), options);
       chart.render();
       document.addEventListener('ColorChange', (e) => {
           const newOpt = { colors: [e.detail.detail1, e.detail.detail2], }
           chart.updateOptions(newOpt)
       })
   }
</script>
