<?php 


include_once '../includes/dbprocess.php';

if(isset($_SESSION['isLoggedin'])){
  
}else{
  header("Location: ../index.php");
}



include 'includes/header.php'; 

include 'includes/menu.php'; ?>


<body>
        <div class="title-top">

                <div class="title-wrapper">
                    <h2>MICROSOFT COMPANY</h2>
                </div>
        <div class="title-wrapper">
                    <h2>Income Statement</h2>
                    <p>for the Month ended January 31, 2021</p>
                </div>
        </div>

        <div class="button-wrapper">
        <button data-modal-target="#modal3" class="buttonss views">
            <span class="button__texts">VIEW IS</span>
            <span class="button__icons">
            <ion-icon name="wallet-outline"></ion-icon>
             </span>
        </button>
        </div>




        <table class="content-table income-table">
            <thead>
                <tr>
                <th>INCOME</th>
                <th>AMOUNT</th>
              
            
                </tr>
            </thead>
            <tbody>
                <tr>
               
                <td >Sales</td>
                <td><strong>₱</strong> 307,960</td>
                </tr>
               
                <tr>
               
                    <td >Service Income</td>
                    <td><strong>₱</strong> 152,000</td>

               </tr>
               <tr>
               
                    <td >Interest Income </td>
                    <td><strong>₱</strong>3,0000</td>

              </tr>
              <tr>
               
               <td >Other Income </td>
               <td><strong>₱</strong>15,000</td>

         </tr>
              
               <tr style="background: #fef4a9;">
                    <th style="color:#009879; text-align:left;" class="total">TOTAL INCOME</th>
                    <td ><strong>₱</strong> 477,960</td>
           
                </tr>
             
           
                
            </tbody>
            </table>
            <table class="content-table income-table">
            <thead>
                <tr>
                <th>EXPENSES</th>
                <th>AMOUNT</th>
              
            
                </tr>
            </thead>
            <tbody >
                <tr>
               
                <td >Inventory Purchases</td>
                <td><strong>₱</strong> 440,880</td>
                </tr>
               
                <tr>
               
                    <td >Salaries Expense</td>
                    <td><strong>₱</strong> 18,000</td>

               </tr>
               <tr>
               
                    <td >Administrative Expense </td>
                    <td><strong>₱</strong>24,000</td>

              </tr>
              <tr>
               
                    <td >Insurance </td>
                    <td><strong>₱</strong>15,000</td>

              </tr>
              <tr>
               
                    <td >Rent </td>
                    <td><strong>₱</strong>7,000</td>

              </tr>
              
              <tr>
               
               <td >Marketing </td>
               <td><strong>₱</strong>2,000</td>

              </tr>
              <tr>
               
               <td >Utilities </td>
               <td><strong>₱</strong>800</td>

              </tr>  

              <tr>
               
               <td >Supplies </td>
               <td><strong>₱</strong>1,400</td>

              </tr>  
              
              <tr>
               
               <td >Interest </td>
               <td><strong>₱</strong>3,000</td>

              </tr>  
              <tr>
               
               <td >Miscellaneous </td>
               <td><strong>₱</strong>15,000</td>

              </tr>  
              <tr>
               
               <td >Other Expenses </td>
               <td><strong>₱</strong>1,800</td>

              </tr>  

              <tr style="background: #fef4a9;">
                    <th style="color:#009879; text-align:left;" class="total">TOTAL EXPENSES</th>
                    <td ><strong>₱</strong> 532,880</td>
           
                </tr>
                <tr style="background:#a7ff83;">
                    <th style="color:#009879; text-align:left;" class="total">NET PROFIT LOSS</th>
                    <td ><strong>₱</strong> 54,920</td>
           
                </tr>


            </tbody>
      </table>
  
            <div class="button-footer">
        <button type="button" class="buttonss">
            <span class="button__texts">PRINT</span>
            <span class="button__icons">
            <ion-icon name="receipt-outline"></ion-icon>
        </span>
        </button>
        <button type="buttons" class="buttonss">
            <span class="button__texts">Download</span>
            <span class="button__icons">
            <ion-icon name="download-outline"></ion-icon>
        </span>
        </button>
</div>


<div class="modal3" id="modal3">
    <div class="modal-header">
      <div class="title"></div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
    <div class="wrapper">
                    <input type="radio" name="select" id="option-1"  onclick="show1();">
                    <input type="radio" name="select" id="option-2" onclick="show2();">.
                    <input type="radio" name="select" id="option-3" onclick="show3();">
                    <label for="option-1" class="option option-1">
                        <div class="dot"></div>
                        <span class="labeled">Monthly</span>
                    </label>
                    <label for="option-2" class="option option-2">
                        <div class="dot"></div>
                        <span  class="labeled">Quarterly</span>
                    </label>
                    <label for="option-3" class="option option-3">
                        <div class="dot"></div>
                        <span  class="labeled">Yearly</span>
                    </label>
            </div>

            <div id="Monthly" class="hide">
                     <div class="monthly-wrapper">
                          <span class="custom-dropdown big">
                         <select>    
                                <option>Month</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>      
                          </select>
               </span>

                 
                   
               <div class="search">
                    
                    <input type="text"  id="text" name="text"  placeholder="YEAR">
                     
                     <div class="button-wrapper">
                     <button class="buttonss views search-btn" type="submit" name="Search">
                         <span class="button__texts">FIND</span>
                         <span class="button__icons">
                         <ion-icon name="search-outline"></ion-icon>
                         </span>
                     </button>
                     </div>
                </div>
                 
            </div>     
         </div>
                    <div id="Quarterly" class="hide">

                        <span class="custom-dropdown big">
                        <select>    
                        <option>Quarter 1</option>
                        <option>Quarter 2</option>
                        <option>Quarter 3</option>
                        <option>Quarter 4</option>
                      

                        </select>


                        </span>
                        <div class="search">
                    
                    <input type="text"  id="text" name="text"  placeholder="YEAR">
                     
                     <div class="button-wrapper">
                     <button class="buttonss views search-btn" type="submit" name="Search">
                         <span class="button__texts">FIND</span>
                         <span class="button__icons">
                         <ion-icon name="search-outline"></ion-icon>
                         </span>
                     </button>
                     </div>
                </div>
                                
                        </div>
                    <div id="Yearly" class="hide">

                    <div class="search">
                    
                    <input type="text"  id="text" name="text"  placeholder="YEAR">
                     
                     <div class="button-wrapper">
                     <button class="buttonss views search-btn" type="submit" name="Search">
                         <span class="button__texts">FIND</span>
                         <span class="button__icons">
                         <ion-icon name="search-outline"></ion-icon>
                         </span>
                     </button>
                     </div>
                </div>
               
                    </div>

              </div>          
    
    <div class="row">
     
      <div class="card">
        <div class="card-header">
          <h1>IS 01/21</h1>
        </div>
        <div class="card-body">
          <p>
           
          </p>
          <a href="#" class="btn">VIEW</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
        <h1>IS 01/21</h1>
        </div>
        <div class="card-body">
          <p>
           
          </p>
          <a href="#" class="btn">VIEW</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
        <h1>IS 01/21</h1>
        </div>
        <div class="card-body">
          <p>
           
          </p>
          <a href="#" class="btn">VIEW</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
        <h1>IS 01/21</h1>
        </div>
        <div class="card-body">
          <p>
           
          </p>
          <a href="#" class="btn">VIEW</a>
        </div>
      </div>
    </div>
  </div>

  </div>
  <div id="overlay3"></div>


  <div class="space" style="height: 100px;"></div>


 
</body>


<?php include 'includes/footer.php' ?>

<script>
    function show1(){
  document.getElementById('Monthly').style.display ='block';
  document.getElementById('Quarterly').style.display ='none';
  document.getElementById('Yearly').style.display ='none';
}
function show2(){
  document.getElementById('Quarterly').style.display = 'block';
  document.getElementById('Monthly').style.display ='none';
  document.getElementById('Yearly').style.display ='none';
}
function show3(){
  document.getElementById('Quarterly').style.display = 'none';
  document.getElementById('Monthly').style.display ='none';
  document.getElementById('Yearly').style.display ='block';
}
</script>