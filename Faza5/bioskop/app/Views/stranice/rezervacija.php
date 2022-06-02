<!--Marija Stefanovic 2019/0068-->
<html lang="en">
<head>

    <style>

        #slika1{
            height: 250px;
            width: 150px;
        }
        .seat {
            background-color:rgb(80, 79, 79);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height:24px;
            width: 30px;
            margin: 12px;
            border-spacing: 10px;
        }
        .seatSelected{
        background-color: rgb(170, 169, 169);
        border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height:24px;
            width: 30px;
            margin: 12px;
            border-spacing: 10px;
        }
        input[type=submit]{
            height: 25px;
                font-size:17px;
        }
        
       
    </style>
    <script>
            temp='';
       document.addEventListener('click',(e)=>{
            if(e.target.classList=="seat"){
               
                e.target.classList="seatSelected";
                temp=temp+';'+e.target.id;
               
                
                document.getElementById("obelezenaMesta").value=temp;
            }else if(e.target.classList=="seatSelected"){
                e.target.classList="seat";
                
                for(i=0;i<temp.length/3;i++){
                    t=temp.substr(i*3+1,2);
                    l=e.target.id;
                    if (l==t) {
                       pre=temp.substring(0,i*3);
                       posle=temp.substring(i*3+3,temp.length);
                       temp=pre+posle;
                       
                    }
                    
                }
               
                document.getElementById("obelezenaMesta").value=temp;
                
            }
        });
        function rezervisi(){
            alert(document.getElementById("obelezenaMesta").value);
        }
        
       
       
    </script>
</head>
<body>
    
   <div style="text-align:center; color:red" >
        <?php
        if(isset($poruka)){echo $poruka;}
           
        ?>
    </div>
   <div style="display: block;">
   <div>
       <table width="87%" align="left">
            <tr>
                <td rowspan="2"  style="text-align: left;">
                    <?php echo "<img id='slika1' src='data:image/jpeg;base64,".base64_encode($projekcija[3])."'>"; ?>
                        
                </td>
                <td>
                <div >
                    <table align="center" >
                        <tr style="font-size: x-large; text-align:center;">
                            <?php
                    
                            echo "<td width='33%'>{$projekcija['naziv']} </td>";
                            echo "<td width='300px'>{$projekcija['datum']}</td>";
                            echo "<td width='33%'>{$projekcija['sala']}</td>";
                            ?>
                        </tr>
                    </table>
                    <br>
                    <br><br><br>
                </div>
                </td>
            </tr>
            <tr>
                <td>
                <div id="seats" >
                <table cellspacing="8" align="center"  >
                        <tr>
                            <td class="seat" id="11" onclick="changeClass"></td>
                            <td class="seat" id="12" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="13" onclick="changeClass"></td>
                            <td class="seat" id="14" onclick="changeClass"></td>
                            <td class="seat" id="15" onclick="changeClass"></td>
                            <td class="seat" id="16" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="17" onclick="changeClass"></td>
                            <td class="seat" id="18" onclick="changeClass"></td>
                            
                        </tr>
                        <tr>
                            <td class="seat" id="21" onclick="changeClass"></td>
                            <td class="seat" id="22" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="23" onclick="changeClass" ></td>
                            <td class="seat" id="24" onclick="changeClass"></td>
                            <td class="seat" id="25" onclick="changeClass"></td>
                            <td class="seat" id="26" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="27" onclick="changeClass"></td>
                            <td class="seat" id="28" onclick="changeClass"></td>
                        </tr>
                        
                        <tr>
                            <td class="seat" id="31" onclick="changeClass"></td>
                            <td class="seat" id="32" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="33" onclick="changeClass"></td>
                            <td class="seat" id="34" onclick="changeClass"></td>
                            <td class="seat" id="35" onclick="changeClass"></td>
                            <td class="seat" id="36" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="37" onclick="changeClass"></td>
                            <td class="seat" id="38" onclick="changeClass"></td>
                        </tr>
                        <tr>
                            <td class="seat" id="41" onclick="changeClass"></td>
                            <td class="seat" id="42" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="43" onclick="changeClass"></td>
                            <td class="seat" id="44" onclick="changeClass"></td>
                            <td class="seat" id="45" onclick="changeClass"></td>
                            <td class="seat" id="46" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="47" onclick="changeClass"></td>
                            <td class="seat" id="48" onclick="changeClass"></td>
                        </tr>
                    
                        <tr>
                            <td class="seat" id="51" onclick="changeClass"></td>
                            <td class="seat" id="52" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="53" onclick="changeClass"></td>
                            <td class="seat" id="54" onclick="changeClass"></td>
                            <td class="seat" id="55" onclick="changeClass"></td>
                            <td class="seat" id="56" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="57" onclick="changeClass"></td>
                            <td class="seat" id="58" onclick="changeClass"></td>
                        </tr>
                        <tr>
                            <td class="seat" id="61" onclick="changeClass"></td>
                            <td class="seat" id="62" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="63" onclick="changeClass"></td>
                            <td class="seat" id="64" onclick="changeClass"></td>
                            <td class="seat" id="65" onclick="changeClass"></td>
                            <td class="seat" id="66" onclick="changeClass"></td>
                            <td></td> <td></td>
                            <td class="seat" id="67" onclick="changeClass"></td>
                            <td class="seat" id="68" onclick="changeClass"></td>
                        </tr>
                    </table>
                </div>
                </td>
            </tr>
        </table>
    </div>
    <br> 
    <div style="padding-left: 70px;" >
    <form name="rezervisiform" action="<?= site_url("Gledalac/rezervisi") ?>" method="post">
        <table width="100%" align="center" style="text-align: center;">
            <tr>
                <td>
                    <br>
                    <input type="checkbox" name="mesto" id="mesto" > 
                    <label for="" style="font-size: large;">Bilo koje mesto</label>
                    <input type="number" name="brojKarata" min="1" max="48" id="brojKarata">
                    <label for="" style="font-size: large;">Broj karata</label>
                    <input type="hidden" id="obelezenaMesta" name="obelezenaMesta" value="">

                 </td>
            </tr>       
            <tr>
                <td>
                    
                    <br>
                    <input style="size: 50px;" type="submit" value="Rezervisi"/>
                   
                    
            
                </td>
            </tr>
        </table>
    </form>
    </div>
    </div>
</body>
</html>
