        <?php
        require_once('./db/db.php');
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>회원가입 페이지</title>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
        </head>
        <body>
            <form name='register' action='register_action.php' method='post'>
                <h1>회원가입 페이지</h1>
                <fieldset>
                    <legend>입력사항</legend>
                    <table>
                        <tr>
                            <td>이름</td>
                            <td><input type='text' id='user_name' name='user_name' placeholder='이름을 입력해주세요'></td>
                        </tr>
                        <tr>
                            <td>아이디</td>
                            <td><input type='text' id='user_id' name='user_id' class='check' placeholder='아이디를 입력해주세요'></td>
                            <td><input type='button' value='중복확인' onclick='checkId()'></td>
                        </tr>
                        <tr>
                            <td>비밀번호</td>
                            <td><input type='password' id='user_pw' name='user_pw' placeholder='비밀번호를 입력해주세요'></td>
                        </tr>
                        <tr>
                            <td>비밀번호 확인</td>
                            <td> <input type='password' id='user_pw2' name='user_pw2' placeholder='비밀번호를 다시 입력해주세요'></td>
                        </tr>
                        <tr>
                            <td>성별</td>
                            <td>
                                 <input type='radio' id='user_gender' name='user_gender' value='m' checked><label for="user_gender">남</label>
                                <input type='radio' id='user_gender2' name='user_gender' value='w'><label for="user_gender2">여</label>
                            </td>
                        </tr>
                        <tr>
                            <td>생년월일</td>
                            <td><input type='date' id='user_date' name='user_date'></td>
                        </tr>
                        <tr>
                            <td>전화번호</td>
                            <td>
                                <input type='text' maxlength='13' name='user_tel' id='tel1' placeholder='핸드폰번호를 입력해주세요' onKeyup='inputPhoneNumber(this);'>
                            </td>
                        </tr>
                    <br><br><br>
                    <tr>
                        <td>
                            <button type='button' onclick='joinform_check();'>가입하기 </button> &nbsp;
                            <input type='button' value='뒤로가기' onClick='history.back()'>
                        </td>
                    </tr>
                    </table>
                </fieldset>
            </form>

           <script>
               function checkId() {
                   window.open('checkId.php?user_id=' + document.register.user_id.value,'IDcheck','left=100, top=100, width=300, height=300, scrollbars=no, resizeable=no');
               }
           </script>
       
           <script>
                   function joinform_check(){
                       let user_name = document.getElementById('user_name');
                       let user_id = document.getElementById('user_id');
                       let user_pw = document.getElementById('user_pw');
                       let user_pw2 = document.getElementById('user_pw2');
                       let user_gender = document.getElementById('user_gender');
                       let user_date = document.getElementById('user_date');
                       let user_tel = document.getElementById('user_tel');
                       
                       if(user_name.value == ""){
                           alert("이름을 입력하세요");
                           user_name.focus();
                           return false;
                       };
       
                       if(user_id.value == ""){
                           alert("아이디를 입력하세요");
                           user_id.focus();
                           return false;
                       };
       
                       if(user_pw.value == ""){
                           alert("비밀번호를 입력하세요");
                           user_pw.focus();
                           return false;
                       };
       
                       if(user_pw.value !== user_pw2.value){
                           alert("비밀번호가 일치하지 않습니다.");
                           user_pw2.focus();
                           return false;
                       };
       
                       if(user_date.value == ""){
                           alert("생년월일을 입력하세요");
                           user_date.focus();
                           return false;
                       }
       
                       document.register.submit();
                   }
               </script>

                <!-- 핸드폰 자동 하이픈 -->
               <script>
                    function inputPhoneNumber(obj) {
                        var number = obj.value.replace(/[^0-9]/g, "");
                        var phone = "";

                        if(number.length < 4) {
                            return number;
                        } else if(number.length < 7) {
                            phone += number.substr(0, 3);
                            phone += "-";
                            phone += number.substr(3);
                        } else if(number.length < 11) {
                            phone += number.substr(0, 3);
                            phone += "-";
                            phone += number.substr(3, 3);
                            phone += "-";
                            phone += number.substr(6);
                        } else {
                            phone += number.substr(0, 3);
                            phone += "-";
                            phone += number.substr(3, 4);
                            phone += "-";
                            phone += number.substr(7);
                        }
                        obj.value = phone;
                    }
                   </script>
        </body>
        </html>