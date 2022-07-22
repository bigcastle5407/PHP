        <?php
        require_once('./db/db.php');
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
            $(document).ready(function(e) { 
	        $(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
		    var self = $(this); 
		    var user_id; 
		
		    if(self.attr("user_id") === "user_id"){ 
			user_id = self.val(); 
		    } 
		
		    $.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
			"action.php?mode=id_check",
			{ user_id : user_id }, 
			function(data){ 
				if(data){ //만약 data값이 전송되면
					self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
					self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
				}
			}
		);
	});
});
</script>
            
        </head>
        <body>
            <form action='action.php?mode=register' method='post'>
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
                            <td><div id = "id_check">아이디가 실시간으로 검색됩니다</div></td>
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
                            <input type ='submit' value='가입'> &nbsp;
                            <input type ='button' value='뒤로가기' onClick='history.back()'>
                        </td>
                    </tr>
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