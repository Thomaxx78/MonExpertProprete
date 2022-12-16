let choice_category = document.querySelector('#select_category');

let all_category = [0, 1, 2, 3, 4];

choice_category.addEventListener('change', function() {
    if(choice_category.value == 0){
        all_category.forEach(function(element) {
            if(document.querySelector('.category_' + element)!=null && element!=0){
                document.querySelector('.category_' + element).style.display = 'flex';
        }}
        );
        return;
    }
    all_category.forEach(function(element) {
        if(document.querySelector('.category_' + element)!=null && element!=0){
            document.querySelector('.category_' + element).style.display = 'none';
        }
    }
    );
    if(document.querySelector('.category_' + choice_category.value)!=null){
        document.querySelector('.category_' + choice_category.value).style.display = 'flex';
    }
});