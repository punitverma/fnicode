
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard <span class="text-xs"></span></h1>
    <!--
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5  font-weight-bold text-primary text-uppercase mb-1">Profile</div>
                      <div class="text-xs mb-0 font-weight-bold text-red-800"><font color='red'><?= $data->frenchietype->name ?></font></div>
                      
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">User ID : <?= $data->id ?></div>

                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Firm Name : <?= $data->name ?></div>
                      
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Owner Name : <?= $data->ownername ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">eMail Id : <?= $data->email ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Mobile : <?= $data->mobile ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">PAN No : <?=  $data->pan ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">GST No : <?=  $data->gst ?> </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 font-weight-bold text-success text-uppercase mb-1">Bank</div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">BANK NAME: <?= $data->bank?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">BRANCH : <?= $data->branch ?></div>
                      <div class="text-xs ml-2  text-gray-800">  IFSC : <?= $data->ifsc ?></div>
                      <div class="text-xs ml-2  text-gray-800">  A/C No : XXXXXXXX<?= substr( $data->accountno ,-4) ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Wallet Cr. Points: <?= $data->cr_amount?></div>
                       
                    </div>
                    <div class="col-auto">
                    
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 font-weight-bold text-info text-uppercase mb-1">Stock</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <div class="text-xs mb-0 mr-3 font-weight-bold text-gray-800">Product Name : Qty Avl</div>
                        
                          <?php foreach ($stocks as $rec) : ?> 
                          <div class="text-xs mb-0 mr-3  text-gray-800"><?= $rec->item->name ?> : <?= $rec->qty ?></div>
                          <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <a href="/stocks/details"> more details >></a>
                    </div>
                 
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 font-weight-bold text-warning text-uppercase mb-1">Offers</div>
                     
                      <?php foreach ($offers as $rec) : ?> 
                          <div class="text-xs mb-0 mr-3 font-weight-bold  text-gray-800"> * <?= $rec->name?> </div>
                          <?php endforeach; ?>
                     
                      </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">
  <!-- Color System -->
  <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                    NO OF SALES PRAMOTOR

                      <div class="text-white-50 small"><?= $admindata->f_sale ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                    NO OF DISTRICT FRANCHISEE

                      <div class="text-white-50 small"><?= $admindata->f_district ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    NO OF CITY FRANCHISEE

                      <div class="text-white-50 small"><?= $admindata->f_city ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                                
                
                    <div class="card-body">
                    NO OF HOME FRANCHISEE

                      <div class="text-white-50 small"><?= $admindata->f_home ?></div>
                    </div>
                  </div>
                </div>
                </div>
                </div>

            <!-- Content Column -->
            <div class="col-lg-6  mb-4">
            <div class="card h-50 shadow border"> 
                <div class="card-body">
                <h5 class="card-title">  Message/Alert Box</h5>
 <marquee onmouseover="this.stop();" onmouseout="this.start();" direction = "up" scrolldelay="200" behavior="scroll"><p style="font-family: Impact; font-size: 14pt"><?= is_null($alerts[0]['message']) ? '' : $alerts[0]['message']?></p></marquee>
</div>  
        </div>
              </div>
           
              <!-- Project Card Example -->
            
             </div>
                

          
            