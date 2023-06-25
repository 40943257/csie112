//Rui-Xin 新增機構 更新機構
    document.addEventListener('DOMContentLoaded', function() {
        var normalCheckbox = document.getElementById('normal');
        var unnormalCheckbox = document.getElementById('unnormal');
        var divCostnormal = document.getElementById('costnormal');
        var divCostunnormal = document.getElementById('costunnormal');

        var hNormalInput = document.getElementsByName('h_normal')[0];
        var mNormalInput = document.getElementsByName('m_normal')[0];
        var hUnnormalInput = document.getElementsByName('h_unnormal')[0];
        var mUnnormalInput = document.getElementsByName('m_unnormal')[0];

        normalCheckbox.addEventListener('change', function() {
            if (normalCheckbox.checked) {
                createInputs('normal');
            } else {
                removeInputs('normal');
            }
        });

        unnormalCheckbox.addEventListener('change', function() {
            if (unnormalCheckbox.checked) {
                createInputs('unnormal');
            } else {
                removeInputs('unnormal');
            }
        });

        function createInputs(type) {                       //顯示
            if(type === 'normal'){
                divCostnormal.style.display = 'block';
                hNormalInput.required = true;
                mNormalInput.required = true;
            }
            if(type === 'unnormal'){
                divCostunnormal.style.display = 'block';
                hUnnormalInput.required = true;
                mUnnormalInput.required = true;
            }
        }

        function removeInputs(type) {                       //隱藏
            if(type === 'normal'){
                divCostnormal.style.display = 'none';
                hNormalInput.required = false;
                mNormalInput.required = false;
            }
            if(type === 'unnormal'){
                divCostunnormal.style.display = 'none';
                hUnnormalInput.required = false;
                mUnnormalInput.required = false;
            }
        }
    });