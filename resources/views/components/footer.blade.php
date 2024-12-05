<style>
    .bg-dark-green {
        background-color: #4caf50 !important;
    }

    .faq-section {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        margin-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 15px;
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .faq-question i {
        transition: transform 0.3s ease;
    }

    .faq-question.active i {
        transform: rotate(180deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        padding: 0 10px;
        margin-top: 0;
        opacity: 0;
        transform: translateY(-10px);
    }

    .faq-answer.show {
        max-height: 200px;
        opacity: 1;
        transform: translateY(0);
        margin-top: 10px;
    }

    .faq-button {
        background-color: #FCCD2A;
        color: #333;
        border: none;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 15px;
    }

    .faq-button:hover {
        background-color: #e0b825;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        color: #333;
        text-decoration: none;
    }
</style>



@push('scripts')
<script>
function toggleAnswer(id) {
    const answer = document.getElementById(id);
    const question = answer.previousElementSibling;
    const allAnswers = document.querySelectorAll('.faq-answer');
    const allQuestions = document.querySelectorAll('.faq-question');

    // Close all other answers
    allAnswers.forEach(item => {
        if (item.id !== id) {
            item.classList.remove('show');
            item.previousElementSibling.classList.remove('active');
        }
    });

    // Toggle current answer
    answer.classList.toggle('show');
    question.classList.toggle('active');
}

function showAllFaqs() {
    const allAnswers = document.querySelectorAll('.faq-answer');
    const allQuestions = document.querySelectorAll('.faq-question');

    allAnswers.forEach(answer => {
        answer.classList.add('show');
    });

    allQuestions.forEach(question => {
        question.classList.add('active');
    });
}

// Add animation classes when the page loads
document.addEventListener('DOMContentLoaded', function() {
    const faqSection = document.querySelector('.faq-section');
    if (faqSection) {
        faqSection.style.opacity = '0';
        faqSection.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            faqSection.style.transition = 'all 0.5s ease-out';
            faqSection.style.opacity = '1';
            faqSection.style.transform = 'translateY(0)';
        }, 300);
    }
});
</script>
@endpush
