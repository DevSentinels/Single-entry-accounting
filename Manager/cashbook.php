
<?php include 'includes/header.php'; 

include 'includes/menu.php'; ?>

<body>


    <div class="title-top">

            <div class="title-wrapper">
                <h2>EXAMPLE COMPANY</h2>
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

               <span class="custom-dropdown big">
               <select>    
                    <option>Year</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>

                    
               </select>
               </span>
          </form>
 </div>
 </div>
 <div class="modal" id="modal">
                <div class="modal-header">
                     <div class="title"></div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form action="">
                              
                                <div class="input-container name combobox">
                                  
                                <input type="date">
                             
                               
                                   
                                <span class="custom-dropdown big large">
                                <select>    
                                        <option>Description</option>
                                        <option>Beginning balance</option> 
                                        <option>Investment</option>  
                                        <option>Sales</option>
                                        <option>Service Home</option>
                                        <option>Bank Financing Long Term</option>
                                        <option>Bank Financing Short Term</option>
                                        <option>Shareholder Investment</option>
                                        <option>Other source of cash</option>
                                        <option>Other Income</option>
                                        <option>Salaries and Wages</option>
                                        <option>Rent Expenses</option>
                                        <option>Amortization Expenses</option>
                                        <option>Marketing Expenses</option>
                                        <option>Utilities Expenses</option>
                                        <option>Insurance Expenses</option>
                                        <option>Inventory Purchases</option>
                                        <option>Loan Payments - short term</option>
                                        <option>Loan Payments - Long term</option>
                                        <option>Supplies Expenses</option>
                                        <option>Miscellaneous Expenses</option>
                                        <option>Interest Income</option>
                                        <option>Interest Expenses</option>
                                        <option>Administrative Expenses</option>
                                        <option>Selling and distribution Expenses</option>
                                        <option>Other uses of cash </option>
                                        <option>Other Expenses</option>
                                        <option>Equipment</option>
                                        <option>Vehicle</option>
                                        <option>Furniture</option>
                                        <option>Other non-current assets</option>
                                        <option>Ending Balance</option>


                                </select>
                                </span>
                                </div>
                                <div class="input-container email">
                                    <label for="text">Inflows</label>
                                    <input type="text"   name="outflows" placeholder="Input your cash outflows">
                                </div>
                                <div class="input-container password">
                                    <label for="text">Outflows</label>
                                    <input type="text"  name="inflows" placeholder="Input your cash outflows">
                         
                                </div>
                               
                                <div class="input-container cta">
                                        <button class="signup-btn continue">Continue</button>
                                </div>
                               
                            </form>
                        </div>
                   </div>
            <div id="overlay"></div>
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
                <tr>
                        <td data-label="DATE">June 03</td>
                        <td data-label="Description">Equipment</td>
                        <td data-label="Inflows"> <strong></strong> </td>
                        <td data-label="Outflows"><strong>₱</strong>20,000</td>
                        <td data-label="Balance"><strong>₱</strong> 370,000</td>
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
                <tr>
                        <td data-label="DATE">June 06</td>
                        <td data-label="Description">Supplies Expenses</td>
                        <td data-label="Inflows"> <strong></strong> </td>
                        <td data-label="Outflows"><strong>₱</strong>1,400</td>
                        <td data-label="Balance"><strong>₱</strong> 368,600</td>
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
                <tr>
                        <td data-label="DATE">June 08</td>
                        <td data-label="Description">Selling Distribution Expenses</td>
                        <td data-label="Inflows"> <strong></strong> </td>
                        <td data-label="Outflows"><strong>₱</strong>200</td>
                        <td data-label="Balance"><strong>₱</strong> 368,400</td>
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
                <tr>
                        <td data-label="DATE">June 08</td>
                        <td data-label="Description">Inventory Purchases</td>
                        <td data-label="Inflows"> <strong></strong> </td>
                        <td data-label="Outflows"><strong>₱</strong>152,880</td>
                        <td data-label="Balance"><strong>₱</strong>215,520</td>
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

        </body>

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