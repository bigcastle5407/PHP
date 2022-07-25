<!-- 
    * register.php
        - line 24 : script src의 경로에 있는 파일이 존재하지 않는 것 같습니다. 확인해주세요.
        - line 36 : var 보다는 let, const 를 지향하고 있습니다. 자바스크립트 코드 작성 시 let과 const로 변수를 선언해주세요.
        - line 46 : '이름'값에 대한 체크이기 때문에, user_name.focus() 가 맞아보입니다.
        - line 135 : 다음과 같은 에러가 발생합니다. ( Cannot set properties of null (setting 'onkeyup') )
            => 왜 에러가 발생하는지, 핸드폰번호 입력 시 'autoHypenPhone' 함수가 왜 정상작동하지 않는지 이유를 찾아보시고, 제대로 작동되도록 수정해주세요. (30분 이상 시간이 걸리면, 바로 말씀해주세요.)
        - line 147 : tag의 속성을 입력하실 때 '='의 좌우를 띄지 않도록 해주세요.
            => name='test' (O) / name = 'test' (X)
        - line 197 : 세미콜론(;)은 "" 안쪽에 작성해주세요.
            => onclick="test();" (O) / onclick="test()"; (X)
    
    * main.php
        - line 29 : href 속성값은 '나 "으로 한번 감싸주세요.
            => 마찬가지로, tag의 속성을 입력하실 때 '='의 좌우를 띄지 않도록 해주세요.
    
    * checkId.php
        - line 15,26,31 : tag의 속성값은 '나 "로 감싸주세요.
            => type="button" / value="닫기" 등등..

    * action.php
        - mode 값으로 케이스를 분류해서 작업하신 것 너무 좋습니다 굿굿
        - 현재의 경우 케이스가 많지 않지만, 추후 작업시 케이스가 많아지면 (이름이 비슷비슷할때) 협업을 위해 반드시 주석을 달아주세요.
            => id_check 의 경우 id 중복체크인지, id 형식체크인지 헷갈릴 수 있습니다. "// 아이디 중복체크" 이런식으로 주석을 달아주세요.
 --> 