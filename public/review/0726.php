<!-- 
    2022.07.26 - 최유현

    * coding
        - 코드 작성하실 때 짝태크 먼저 작성하기 및 띄어쓰기 정리 확인해주세요.
        - html 태그 작성 시에 태그 들여쓰기 정리 신경써주세요.
        - 줄 띄움처리하실 때 작성자뿐 아니라 읽는사람도 한눈에 보기 쉽도록 최대한 처리해주세요. (현재 불필요한 줄띄움이 많습니다.)
        - html 태그 작성 시 single quote (') or double quote (") 로 통일해주세요.
        - sql문은 따로 변수선언해서 사용해주세요.
    
    * action.php
        - sql문 작성하실 때 세미콜론(;) 제외해주세요.
        - $wu, $wp와 같이 사용하지 않는 변수의 선언을 최소화해주세요.
        - header(); 작성하실 때 Location: 과 location: 이 혼동되고 있습니다. 대문자/소문자 통일해주세요.
        - sql문 작성은 아래와 같이 해주세요.
            -- $sql = "
                    select user_id
                    from tb_user
                    where user_id = 'test'
                ";

    * login.php
        - POST 방식으로 전송하실 때, url을 GET방식으로 작성하지 않고, 해당 파라미터를 다른 값들과 함께 POST방식으로 전송하는 방향으로 수정해주세요. (다른 페이지 POST전송 시에도 마찬가지로 적용)

    * main.php
        - html 태그 속성을 할당하실 때 '=' 좌우로 띄어쓰기 없도록 해주세요.
        - /css/css.css 파일이 없습니다. 해당 link tag 부분 확인해주세요.

    * register.php
        - html 태그 작성 시 single quote (') or double quote (") 로 통일해주세요.
        - type이 'radio'인 input의 경우, 오른쪽 텍스트 (남, 여) 클릭 시에도 radio 버튼 선택되도록 수정해주세요.
        - 전화번호 input 태그 줄바꿈 확인해주세요.
            -- 다음 두가지 방법 중 하나로 통일해주세요.
            -- <td>
                    <input type="text" maxlength="13" name="user_tel" id="tel1" placeholder="핸드폰번호를 입력해주세요" onKeyup="inputPhoneNumber(this);">
                </td>
            -- <td>
                    <input 
                        type="text" 
                        maxlength="13" 
                        name="user_tel" 
                        id="tel1" 
                        placeholder="핸드폰번호를 입력해주세요" 
                        onKeyup="inputPhoneNumber(this);"
                    >
                </td>
        - javascript 변수 선언하실 때에는 '=' 좌우로 한칸씩 띄어쓰기 해주세요. (보기 더 편합니다.)
        - javascript function 작성하실 때, 들여쓰기 신경써주세요. (아래 예시)
            --  function test() {
                    let n = 1;
                }
 -->