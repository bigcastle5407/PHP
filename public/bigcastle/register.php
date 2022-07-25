        <?php
        require_once('./db/db.php');

        /**
         * 작성 순서는 상단에 php 로직 - 중간에 html - 마지막에 자바스크립트 순으로 가급적 처리할 것
         * 
         * 예)
         * 
         * 1. PHP 로직 ( DB 불러오기 등)
         * 2. HTML 페이지
         * 3. 해당 페이지에 관련된 자바스크립트 프로그래밍
         * 
         */
        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
           

    <script>
        function checkId() {
            window.open("checkId.php?user_id=" + document.register.user_id.value,"IDcheck","left=100, top=100, width=300, height=300, scrollbars=no, resizeable=no");
        }
    </script>

    <script>
            function joinform_check(){
                
                var user_name = document.getElementById('user_name');
                var user_id = document.getElementById('user_id');
                var user_pw = document.getElementById('user_pw');
                var user_pw2 = document.getElementById('user_pw2');
                var user_gender = document.getElementById('user_gender');
                var user_date = document.getElementById('user_date');
                var user_tel = document.getElementById('user_tel');
                
                if(user_name.value == ""){
                    alert("이름을 입력하세요");
                    user_id.focus();
                    return false;
                };

                // var id_ck = /^(?=,*[a-zA-Z])(?=,*[0-9]),{1,8}$/;

                // if(!id_ck.test(user_id.value)){
                //     alert("아이디를 문자+숫자 조합으로 입력해주세요");
                //     user_id.focus();
                //     return false;
                // };

                if(user_id.value == ""){
                    alert("아이디를 입력하세요");
                    user_id.focus();
                    return false;
                };

                // var password_ck = /^(?=,*[a-zA-Z])(?=,*[!@#$%^*+=-])(?=,*[0-9]),{1,8}$/;

                // if(!password_ck.test(user_pw.value)){
                //     alert("비밀번호는 영문자+숫자+특수문자 조합으로 8자리를 입력해주세요");
                //     user_pw.focus();
                //     return false;
                // };

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

                // if(!user_tel.value){
                //     alert("전화번호를 입력하세요");
                //     user_tel.focus();
                //     return false;
                // }
                
                
                document.register.submit();


            
            }
        </script>

        <script>
    	    function autoHypenPhone(str){
                str = str.replace(/[^0-9]/g, '');
            var tmp = '';
            if( str.length < 4){
                return str;
            }else if(str.length < 7){
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3);
                return tmp;
            }else if(str.length < 11){
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 3);
                tmp += '-';
                tmp += str.substr(6);
                return tmp;
            }else{              
                tmp += str.substr(0, 3);
                tmp += '-';
                tmp += str.substr(3, 4);
                tmp += '-';
                tmp += str.substr(7);
                return tmp;
            }
            return str;
        }

            var cellPhone = document.getElementById('tel1');
            cellPhone.onkeyup = function(event){
                    event = event || window.event;
                    var _val = this.value.trim();
                    this.value = autoHypenPhone(_val) ;
            }

            </script>

           
            
        </head>
        <body>
            <form name = "register" action='action.php?mode=register' method='post'>
                <h1>회원가입 페이지</h1>
                <fieldset>
                    <legend>입력사항</legend>
                    <table>
                        <tr>
                            <td>이름</td>
                            <td><input type ='text' id='user_name' name = 'user_name' placeholder="이름을 입력해주세요"></td>
                           
                        </tr>
                        <tr>
                            <td>아이디</td>
                            <td><input type ='text' id='user_id' name = 'user_id' class = "check" placeholder="아이디를 입력해주세요"></td>
                            <!-- <td><div id = "id_check">아이디가 실시간으로 검색됩니다</div></td> -->
                            <td><input type="button" value="중복확인" onclick="checkId()"></td>
                        </tr>
                        <tr>
                            <td>비밀번호</td>
                            <td><input type ='password' id='user_pw' name = 'user_pw' placeholder="비밀번호를 입력해주세요"></td>
                            
                        </tr>
                        <tr>
                            <td>비밀번호 확인</td>
                            <td> <input type ='password' id ='user_pw2' name = 'user_pw2' placeholder="비밀번호를 다시 입력해주세요"></td>
                            
                        </tr>
                        <tr>
                            <td>성별</td>
                            <td>
                                 <input type ='radio' id = 'user_gender' name = 'user_gender' value='m' checked>남
                                <input type ='radio' id = 'user_gender' name = 'user_gender' value='w'>여
                            </td>
                            
                        </tr>
                        <tr>
                            <td>생년월일</td>
                            <td><input type="date" id = "user_date" name ="user_date"></td>
                           
                        </tr>
                        <tr>
                            <td>전화번호</td>
                            <td><input type="text" maxlength = "13" name = "user_tel" id="tel1" placeholder="핸드폰번호를 입력해주세요"></td>
                            
                        </tr>
                   
                    
                    <br><br><br>
                    
                    <tr>
                        <td>
                            <button type='button' onclick="joinform_check()";>가입하기 </button> &nbsp;
                            <input type ='button' value='뒤로가기' onClick='history.back()'>
                        </td>
                    </tr>
                    </table>
                </fieldset>
            </form>

           
        </body>
        </html>