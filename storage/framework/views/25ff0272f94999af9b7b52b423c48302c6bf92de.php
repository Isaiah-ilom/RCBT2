<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT Questions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 100%;
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .header p {
            color: #666;
            font-size: 16px;
        }
        
        .controls {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        @media (max-width: 600px) {
            .controls {
                grid-template-columns: 1fr;
            }
        }
        
        select, input, button {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        select:focus, input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .loading {
            text-align: center;
            padding: 30px;
            color: #667eea;
            font-size: 18px;
            display: none;
        }
        
        .loading.show {
            display: block;
        }
        
        .question-container {
            display: none;
            animation: slideIn 0.3s ease;
        }
        
        .question-container.show {
            display: block;
        }
        
        @keyframes  slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .question-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        
        .meta-label {
            font-size: 12px;
            color: #999;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .meta-value {
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        
        .question-text {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 25px 0;
            border-radius: 8px;
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }
        
        .options {
            display: grid;
            gap: 12px;
            margin: 25px 0;
        }
        
        .option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
        }
        
        .option:hover {
            border-color: #667eea;
            background: #f8f9fa;
        }
        
        .option input[type="radio"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #667eea;
        }
        
        .option label {
            cursor: pointer;
            flex: 1;
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }
        
        .option.correct {
            background: #d4edda;
            border-color: #28a745;
        }
        
        .option.incorrect {
            background: #f8d7da;
            border-color: #dc3545;
        }
        
        .option.selected {
            border-color: #667eea;
            background: #f0f4ff;
        }
        
        .solution-section {
            background: #e7f3ff;
            border-left: 4px solid #0066cc;
            padding: 20px;
            margin-top: 25px;
            border-radius: 8px;
            display: none;
        }
        
        .solution-section.show {
            display: block;
        }
        
        .solution-title {
            font-weight: 700;
            color: #0066cc;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .solution-text {
            color: #333;
            line-height: 1.6;
            white-space: pre-wrap;
            word-break: break-word;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            justify-content: center;
        }
        
        .btn-secondary {
            background: #6c757d;
        }
        
        .btn-secondary:hover {
            box-shadow: 0 10px 20px rgba(108, 117, 125, 0.3);
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            display: none;
        }
        
        .error-message.show {
            display: block;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            display: none;
        }
        
        .success-message.show {
            display: block;
        }
        
        .question-image {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CBT Question Board</h1>
            <p>Practice questions to enhance your knowledge</p>
        </div>
        
        <div class="error-message" id="errorMessage"></div>
        <div class="success-message" id="successMessage"></div>
        
        <div class="controls">
            <select id="subjectSelect">
                <option value="">Loading subjects...</option>
            </select>
            <input type="number" id="quantityInput" placeholder="Number of questions (1-10)" min="1" max="10" value="1">
            <button onclick="loadQuestion()">Get Question</button>
            <button class="btn-secondary" onclick="loadMultipleQuestions()">Get Multiple</button>
        </div>
        
        <div class="loading" id="loading">
            <div style="font-size: 24px;">⏳ Loading question...</div>
        </div>
        
        <div class="question-container" id="questionContainer">
            <div class="question-meta">
                <div class="meta-item">
                    <span class="meta-label">Subject</span>
                    <span class="meta-value" id="subjectDisplay">-</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Type</span>
                    <span class="meta-value" id="typeDisplay">-</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Year</span>
                    <span class="meta-value" id="yearDisplay">-</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Question</span>
                    <span class="meta-value" id="questionNumber">-</span>
                </div>
            </div>
            
            <div class="question-text" id="questionText"></div>
            <img id="questionImage" class="question-image" style="display:none;">
            
            <div class="options" id="optionsContainer"></div>
            
            <div class="solution-section" id="solutionSection">
                <div class="solution-title">Solution</div>
                <div class="solution-text" id="solutionText"></div>
            </div>
            
            <div class="button-group">
                <button onclick="submitAnswer()">Submit Answer</button>
                <button class="btn-secondary" onclick="showSolution()">Show Solution</button>
                <button class="btn-secondary" onclick="loadQuestion()">Next Question</button>
            </div>
        </div>
    </div>

    <script>
        const API_BASE = '/api/v2';
        let currentQuestion = null;
        let selectedAnswer = null;

        async function loadSubjects() {
            try {
                const response = await fetch(`${API_BASE}/q-subjects`);
                const data = await response.json();
                
                const select = document.getElementById('subjectSelect');
                select.innerHTML = '<option value="">Select a subject</option>';
                
                if (data.data && Array.isArray(data.data)) {
                    data.data.forEach(subject => {
                        const option = document.createElement('option');
                        option.value = subject;
                        option.textContent = subject.charAt(0).toUpperCase() + subject.slice(1);
                        select.appendChild(option);
                    });
                }
            } catch (error) {
                showError('Failed to load subjects: ' + error.message);
            }
        }

        async function loadQuestion() {
            const subject = document.getElementById('subjectSelect').value;
            if (!subject) {
                showError('Please select a subject');
                return;
            }
            
            showLoading(true);
            selectedAnswer = null;
            
            try {
                const response = await fetch(`${API_BASE}/q?subject=${subject}`);
                const data = await response.json();
                
                if (data.status === 200 && data.data) {
                    currentQuestion = data.data;
                    displayQuestion(currentQuestion, subject);
                    showLoading(false);
                    showSuccess('Question loaded successfully');
                } else {
                    showError('Failed to load question: ' + (data.error || 'Unknown error'));
                    showLoading(false);
                }
            } catch (error) {
                showError('Error loading question: ' + error.message);
                showLoading(false);
            }
        }

        async function loadMultipleQuestions() {
            const subject = document.getElementById('subjectSelect').value;
            const quantity = parseInt(document.getElementById('quantityInput').value) || 1;
            
            if (!subject) {
                showError('Please select a subject');
                return;
            }
            
            if (quantity < 1 || quantity > 10) {
                showError('Quantity must be between 1 and 10');
                return;
            }
            
            showLoading(true);
            
            try {
                const response = await fetch(`${API_BASE}/m/${quantity}?subject=${subject}`);
                const data = await response.json();
                
                if (data.status === 200 && data.data) {
                    const questions = Array.isArray(data.data) ? data.data : [data.data];
                    if (questions.length > 0) {
                        currentQuestion = questions[0];
                        displayQuestion(currentQuestion, subject);
                        showSuccess(`Loaded ${questions.length} question(s)`);
                    }
                    showLoading(false);
                } else {
                    showError('Failed to load questions');
                    showLoading(false);
                }
            } catch (error) {
                showError('Error loading questions: ' + error.message);
                showLoading(false);
            }
        }

        function displayQuestion(question, subject) {
            const container = document.getElementById('questionContainer');
            container.classList.add('show');
            
            document.getElementById('subjectDisplay').textContent = subject.toUpperCase();
            document.getElementById('typeDisplay').textContent = question.examtype || '-';
            document.getElementById('yearDisplay').textContent = question.examyear || '-';
            document.getElementById('questionNumber').textContent = question.questionNub || '-';
            document.getElementById('questionText').textContent = question.question || '';
            
            if (question.image && question.image.trim()) {
                const img = document.getElementById('questionImage');
                img.src = question.image;
                img.style.display = 'block';
            } else {
                document.getElementById('questionImage').style.display = 'none';
            }
            
            const options = ['A', 'B', 'C', 'D', 'E'];
            const optionsContainer = document.getElementById('optionsContainer');
            optionsContainer.innerHTML = '';
            
            options.forEach((opt, index) => {
                const key = `option${opt}`;
                const value = question[key.toLowerCase()] || question[`option_${opt}`];
                
                if (value) {
                    const optionDiv = document.createElement('div');
                    optionDiv.className = 'option';
                    optionDiv.innerHTML = `
                        <input type="radio" name="answer" value="${opt}" id="opt${opt}" onchange="selectedAnswer = '${opt}'">
                        <label for="opt${opt}">${opt}. ${value}</label>
                    `;
                    optionsContainer.appendChild(optionDiv);
                }
            });
            
            document.getElementById('solutionSection').classList.remove('show');
        }

        function submitAnswer() {
            if (!selectedAnswer) {
                showError('Please select an answer');
                return;
            }
            
            const correct = currentQuestion.answer === selectedAnswer;
            const message = correct ? 'Correct!' : `Incorrect. The correct answer is ${currentQuestion.answer}`;
            
            if (correct) {
                showSuccess(message);
            } else {
                showError(message);
            }
            
            highlightAnswer(selectedAnswer, currentQuestion.answer);
        }

        function highlightAnswer(selected, correct) {
            const options = document.querySelectorAll('.option');
            options.forEach(option => {
                const radio = option.querySelector('input[type="radio"]');
                if (radio.value === correct) {
                    option.classList.add('correct');
                }
                if (radio.value === selected && selected !== correct) {
                    option.classList.add('incorrect');
                }
            });
        }

        function showSolution() {
            const section = document.getElementById('solutionSection');
            section.classList.add('show');
            document.getElementById('solutionText').textContent = currentQuestion.solution || 'No solution available';
        }

        function showError(message) {
            const elem = document.getElementById('errorMessage');
            elem.textContent = message;
            elem.classList.add('show');
            setTimeout(() => elem.classList.remove('show'), 5000);
        }

        function showSuccess(message) {
            const elem = document.getElementById('successMessage');
            elem.textContent = message;
            elem.classList.add('show');
            setTimeout(() => elem.classList.remove('show'), 4000);
        }

        function showLoading(show) {
            document.getElementById('loading').classList.toggle('show', show);
        }

        document.addEventListener('DOMContentLoaded', loadSubjects);
    </script>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/cbt.blade.php ENDPATH**/ ?>