<!-- 
    2022.08.03 - 최유현

    * coding
        - php, js 변수 선언 및 초기화 시에 '=' 좌우로 띄어주세요.
        - sql문을 $sql 변수에 할당 시 한줄 아래로 내러서 보기 편하게 작성해주세요.
            => (예제)
                $sql = "
                    select 
                        name, 
                        user_id
                    from user
                    where 1=1
                ";
        - try-catch문 코드 들여쓰기 신경써주세요.
        - ajax 잘 사용하셨습니다 굿! 수정/삭제도 잘 해주세요~

    
    * calendar/main.php
        - line.98 : if문과 else문의 실행코드가 동일합니다. -> if문과 else문의 실행코드를 다르게 작성하시거나, if문을 없애주세요.

    * goods_notice/reg-popup.php
        - https://code.jquery.com/jquery-1.12.4.min.js 를 2번 import 하고 있습니다.

 -->