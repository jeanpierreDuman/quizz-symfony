$(document).ready(function() {

    $collectionQuestionsHolder = $('ul.questions');
    $collectionQuestionsHolder.data('index', $collectionQuestionsHolder.find(':input').length);

    $(".addQuestion").on('click', function(e) {
        addQuestionForm($collectionQuestionsHolder, 'ul.questions');
    });

    $(".removeQuestion").on('click', function(e) {
        $(this).prev().remove();
        $(this).remove();
    });

    function addQuestionForm($collectionQuestionsHolder, place) {
        var prototype = $collectionQuestionsHolder.data('prototype');
        var index = $collectionQuestionsHolder.data('index');
        var newForm = prototype;

        newForm = newForm.replace(/__name__/g, index);
        $collectionQuestionsHolder.data('index', index + 1);
        $(place).append(newForm);
        $collectionQuestionsHolder.append("<button class='removeQuestion'>supprimer la question</button>");


        $(".removeQuestion").on('click', function(e) {
            $(this).prev().prev().remove();
            $(this).prev().remove();
            $(this).remove();
        });
    }
});
