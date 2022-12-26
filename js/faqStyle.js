let allQuestions = document.querySelectorAll(".questionFAQ");
let i = 1;
let condition = "";

allQuestions.forEach(element => {
    // if device is a phone or tablet
    if(window.innerWidth < 1024){
        condition = i%2 == 0;
    } else {
        condition = [1,4,5,8,9,12,13,16,17,20].includes(i);
    }
    if(condition){
        element.classList.add("bg-gen-blue");
        element.children[0].classList.add("text-white");
        element.children[1].classList.add("text-white");
    } else {
        element.classList.add("bg-white", "border-gen-blue", "border-2", "border-solid");
        element.children[0].classList.add("text-gen-blue");
        element.children[1].classList.add("text-black");
    }
    i++;
});