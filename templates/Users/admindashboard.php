
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span class="text-xs">Last Update on <?= $data->updateon->setTimezone( new \DateTimeZone( 'Asia/Kolkata' ) )->i18nFormat('dd-MM-yyyy HH:mm:ss');
 ?></span></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5  font-weight-bold text-primary text-uppercase mb-1">Registration</div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Total Registred : <?= $data->total_reg ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Total Active : <?= $data->total_reg_active ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">This Week Registred : <?= $data->week_reg ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">This Week Active : <?= $data->week_reg_act ?> </div>
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
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 font-weight-bold text-success text-uppercase mb-1">Business Vol.</div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">LAST WEEK BV : <?= $data->last_week_bv ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">THIS WEEK BV : <?= $data->week_bv ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">TOTAL LEFT SIDE BV : <?= $data->left_bv ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">TOTAL RIGHT SIDE BV : <?= $data->right_bv ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">TOTAL BV : <?= $data->total_bv ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                      <div class="h5 font-weight-bold text-info text-uppercase mb-1">Sales</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="text-xs mb-0 mr-3 font-weight-bold text-gray-800">Total Invoice : <?= $data->total_sale_inv ?> </div>
                          <div class="text-xs mb-0 mr-3 font-weight-bold text-gray-800">Total Amount : <?= $data->total_sale_inv_amount ?>  </div>
                          <div class="text-xs mb-0 mr-3 font-weight-bold text-gray-800">This Week Invoice : <?= $data->week_sale_inv ?>  </div>
                          <div class="text-xs mb-0 mr-3 font-weight-bold text-gray-800">This Week Amount : <?= $data->week_sale_inv_amount ?>  </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                      <div class="h5 font-weight-bold text-warning text-uppercase mb-1">Payout</div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Total Match : <?=$data->total_match_payout ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Total SPONSOR : <?=$data->total_sponsor_payout ?> </div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Weekly Self  : <?=$data->week_self_payout ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Total Self  : <?=$data->total_self_payout ?></div>
          
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Weekly Match  : <?=$data->week_match_payout ?></div>
                      <div class="text-xs mb-0 font-weight-bold text-gray-800">Weekly SPONSOR  : <?=$data->week_sponsor_payout ?></div>
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

                      <div class="text-white-50 small"><?= $data->f_sale ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                    NO OF DISTRICT FRANCHISEE

                      <div class="text-white-50 small"><?= $data->f_district ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    NO OF CITY FRANCHISEE

                      <div class="text-white-50 small"><?= $data->f_city ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                    NO OF HOME FRANCHISEE

                      <div class="text-white-50 small"><?= $data->f_home ?></div>
                    </div>
                  </div>
                </div>
                </div>

            </div>


            <!-- Content Column -->
            <div class="col-lg-6  mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">LIFE TIME REWARDS</h6>
                </div>
                <div class="card-body">
                  <table class="table table-sm small table-dark">
                    <thead>
                      <th>POINT</th>
                      <th>Amount</th>
                      <th>RANK</th>
                      <th>GIFT</th>
                      <th>Achiver</th>
                    </thead>
                    <tbody>

                    <?php foreach ($rewards as $rec): ?>
                     <tr>
                        <td><?= $rec['reward_point'] ?></td>
                        <td><?= $rec['amount'] ?></td>
                        <td><?= $rec['rank'] ?></td>
                        <td><?= $rec['gift'] ?></td>
                        <td><?= $rec['cn']==null ? 0 : $rec['cn'] ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
                

          
            