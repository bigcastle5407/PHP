        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script>
                function checkid(){
                    var user_id = document.getElementById("user_id").value;
                    if(user_id){
                        url = "register.php?user_id="+user_id;
                        alert('사용할 수 있는 아이디입니다')
                    }else{
                        alert('사용할 수 없는 아이디입니다')
                    }
                }


            </script>
        </head>
        <body>
            <h1>회원가입 페이지</h1>
            <form action='register_action' method='post'>
                <fieldset>
                    <table style="border =5">
                    <label><p>이름</p></label>
                    <input type ='text' id='user_name' name = 'user_name' placeholder="이름을 입력해주세요">

                    <label><p>아이디</p></label>
                    <input type ='text' id='user_id' name = 'user_id' placeholder="아이디를 입력해주세요">
                    <input type="button" id="check_button" value="ID 중복 검사" onclick="checkid();"></p>

                    <label><p>비밀번호</p></label>
                    <input type ='password' id='user_pw' name = 'user_pw' placeholder="비밀번호를 입력해주세요">

                    <label><p>비밀번호 확인</p></label>
                    <input type ='password' id ='user_pw_ck' name = 'user_pw_ck' placeholder="비밀번호를 다시 입력해주세요">
                    
                    <label><p>성별</p></label>
                  
                        <input type ='radio' id = 'user_gender' name = 'user_gender' value='m' checked>남
                        
                  
                        <input type ='radio' id = 'user_gender' name = 'user_gender' value='w'>여
                    
                    
                   

                    <label><p>생년월일</p></label>
                    <input type="date" id = "user_date" name ="user_date">

                    <label><p>핸드폰 번호</p></label>
                    <input type="text" maxlength = "13" name = "user_tel" id="tel1" placeholder="핸드폰번호를 입력해주세요">

                    
                    <br><br><br>

                    <input type ='submit' value='회원가입'>
                    <input type ='reset' value='취소'>
                    </table>
                </fieldset>
            </form>

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
        </body>
        </html>