
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
                <h2>Cash book entry</h2>
            </div>
    </div>

<div class="cover">
<div class="box">
<div class="top">
        <button type="buttons" data-modal-target="#modal" class="buttonss">
            <span class="button__texts"  >NEW</span>
            <span class="button__icons">
            <ion-icon name="add-circle-outline"></ion-icon>
        </span>
        </button>
        

        <button type="buttons"  data-modal-target="#modal2" class="buttonss">
            <span class="button__texts">CASHFLOW</span>
            <span class="button__icons">
            <ion-icon name="reader-outline"></ion-icon>
        </span>
        </button>

        <button type="buttons"  data-modal-target="#modal2" class="buttonss">
            <span class="button__texts">INCOME STATEMENT</span>
            <span class="button__icons">
            <ion-icon name="wallet-outline"></ion-icon>
        </span>
        </button>
</div>

<div class="print">
        <button type="button" data-modal-target="#modal2" class="buttonss">
            <span class="button__texts">PRINT</span>
            <span class="button__icons">
            <ion-icon name="receipt-outline"></ion-icon>
        </span>
        </button>
        <button type="buttons" data-modal-target="#modal2" class="buttonss">
            <span class="button__texts">Download</span>
            <span class="button__icons">
            <ion-icon name="download-outline"></ion-icon>
        </span>
        </button>
</div>


</div>

<div class="dropdown">
<form action="">
          <span class="custom-dropdown big">
               <select id="Month">    
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

               <span class="custom-dropdown big">
               <select id="Year">    
                    <option>Year</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                    <option>2028</option>
                    <option>2029</option>
                    <option>2030</option>
               </select>
               </span>
          </form>
 </div>
 </div>
 <script type="text/javascript">

            $(document).ready(function(){
                const monthNames = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"];

                var date = new Date();


                var currentmonth = monthNames[date.getMonth()];
                var currentyear = date.getFullYear();   

            $("#Month").val(currentmonth);
            $("#Year").val(currentyear);
            });
</script>


 <div class="modal" id="modal">
                <div class="modal-header">
                     <div class="title"></div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="../includes/dbprocess.php" Method="POST">
                              
                                <div class="input-container name combobox">
                                  
                                <input type="date" name="date">
                             
                               

                                <span class="custom-dropdown big large">
                                <select name="description">    
                                        <option value="">Description</option>
                                        <option value="Beginning balance">Beginning balance</option> 
                                        <option value="Investment">Investment</option>  
                                        <option value="Sales">Sales</option>
                                        <option value="Service Home">Service Home</option>
                                        <option value="Bank Financing Long Term">Bank Financing Long Term</option>
                                        <option value="Bank Financing Short Term">Bank Financing Short Term</option>
                                        <option value="Shareholder Investment">Shareholder Investment</option>
                                        <option value="Other source of cash">Other source of cash</option>
                                        <option value="Other Income">Other Income</option>
                                        <option value="Salaries and Wages">Salaries and Wages</option>
                                        <option value="Rent Expenses">Rent Expenses</option>
                                        <option value="Amortization Expenses">Amortization Expenses</option>
                                        <option value="Marketing Expenses">Marketing Expenses</option>
                                        <option value="Utilities Expenses">Utilities Expenses</option>
                                        <option value="Insurance Expenses">Insurance Expenses</option>
                                        <option value="Inventory Purchases">Inventory Purchases</option>
                                        <option value="Loan Payments - Short term">Loan Payments - Short term</option>
                                        <option value="Loan Payments - Long term">Loan Payments - Long term</option>
                                        <option value="Supplies Expenses">Supplies Expenses</option>
                                        <option value="Miscellaneous Expenses">Miscellaneous Expenses</option>
                                        <option value="Interest Income">Interest Income</option>
                                        <option value="Interest Expenses">Interest Expenses</option>
                                        <option value="Administrative Expenses">Administrative Expenses</option>
                                        <option value="Selling and distribution Expenses">Selling and distribution Expenses</option>
                                        <option value="Other uses of cash">Other uses of cash</option>
                                        <option value="Other Expenses">Other Expenses</option>
                                        <option value="Equipment">Equipment</option>
                                        <option value="Vehicle">Vehicle</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Other non-current assets">Other non-current assets</option>
                                        <option value="Ending Balance">Ending Balance</option>
                                </select>
                                </span>
                                </div>
                                <div class="input-container email">
                                    <label for="text">Inflows</label>
                                    <input type="text" name="inflows" onkeypress="return onlyNumberKey(event)"  name="outflows" placeholder="Input your cash outflows">
                                </div>
                                <div class="input-container password">
                                    <label for="text">Outflows</label>
                                    <input type="text" name="outflows" onkeypress="return onlyNumberKey(event)" name="inflows" placeholder="Input your cash outflows">
                                </div>
                                <div class="input-container cta">
                                        <button type="submit" name="add_entry" class="signup-btn continue">Continue</button>
                                </div>
                               
                            </form>
                        </div>
                   </div>

                    <script>
                         function onlyNumberKey(evt) {
          
                                 // Only ASCII character in that range allowed
                                 var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                                 if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                                        return false;
                                return true;
                        }
                    </script>


            <div id="overlay"></div>
            <?php
            $query = "SELECT * FROM tblprofiles WHERE NOT Position = 'Admin'";    
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>   
            <table class="content-table table">
            <thead>
                <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Inflows</th>
                <th>Outflows</th>
                <th>Balances</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td data-label="DATE">June 01</td>
                <td data-label="Description">Investment</td>
                <td data-label="Inflows"> <strong>₱ </strong>390,000</td>
                <td data-label="Outflows"></td>
                <td data-label="Balance"><strong>₱ </strong>390,000</td>
                <td data-label="Actions">
                    <form action="#" class="buttons">
                    <button type="submit" class="button"  data-modal-target="#modal">
                    <span class="button__icon">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    </span>
                    </button>

                    <button type="submit" class="button">
                    <span class="button__icon">
                    <ion-icon name="trash-outline"></ion-icon>
                    </span>
                    </button>

                    </form>
                
                </td>
                </tr>
                
            </tbody>
            </table>

          <div class="modal" id="modal2">
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

                 
                   
                 <div class="input-container text">
                     <label for="text">Year</label>
                     <input type="text"  id="text" name="text"  placeholder="YEAR">
                 </div>
                 <div class="input-container cta">
                                        <button class="signup-btn continue">GENERATE</button>
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
                        <div class="input-container text">
                            <label for="text">Year</label>
                            <input type="text"  id="text" name="text"  placeholder="YEAR">
                        </div>
                        <div class="input-container cta">
                                        <button class="signup-btn continue">GENERATE</button>
                                </div>
                                
                        </div>
                    <div id="Yearly" class="hide">

                    <div class="input-container text">
                     <label for="text">Year</label>
                     <input type="text"  id="text" name="text"  placeholder="YEAR">
                 </div>
                 <div class="input-container cta">
                            <button class="signup-btn continue">GENERATE</button>
                    </div>
                            
                    </div>
                            </div>
                        </div>
                                    <div id="overlayIS"></div>


    <script>

            const openModalButtons = document.querySelectorAll('[data-modal-target]')
            const closeModalButtons = document.querySelectorAll('[data-close-button]')
            const overlay = document.getElementById('overlay')

            openModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.dataset.modalTarget)
                openModal(modal)
            })
            })

            overlay.addEventListener('click', () => {
            const modals = document.querySelectorAll('.modal.active')
            modals.forEach(modal => {
                closeModal(modal)
            })
            })

            closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.modal')
                closeModal(modal)
            })
            })

            function openModal(modal) {
            if (modal == null) return
            modal.classList.add('active')
            overlay.classList.add('active')
            }

            function closeModal(modal) {
            if (modal == null) return
            modal.classList.remove('active')
            overlay.classList.remove('active')
            }
    </script>

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


           



         <?php include 'includes/footer.php' ?>