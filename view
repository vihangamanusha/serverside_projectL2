CREATE VIEW QuizMarks AS
SELECT 
    student_id,
    course_code,
    department_id,
    (GREATEST(quiz1, quiz2, quiz3) * 0.025 + 
     GREATEST(LEAST(quiz1, quiz2), LEAST(GREATEST(quiz1, quiz2), quiz3)) * 0.025) AS total_quiz_mark
FROM 
    Marks;


    -- View for CA_marks


    CREATE VIEW CA_Marks AS
SELECT 
    Marks.student_id,
    Marks.course_code,
    (
        (
            (GREATEST(quiz1, quiz2, quiz3) + 
             GREATEST(LEAST(quiz1, quiz2), LEAST(GREATEST(quiz1, quiz2), quiz3))) +  
            assessments +                        
            COALESCE(mid_practical, mid_theory)  
        ) / 10                           
    ) AS total_ca_marks,
    CASE 
        WHEN Student.status = 'suspend' THEN 'WH'
        WHEN Marks.medical_submission_id IS NOT NULL THEN 'MC'
        WHEN (
            (
                (GREATEST(quiz1, quiz2, quiz3) + 
                 GREATEST(LEAST(quiz1, quiz2), LEAST(GREATEST(quiz1, quiz2), quiz3))) +
                assessments +
                COALESCE(mid_practical, mid_theory)
            ) / 10
        ) >= 20 THEN 'Eligible'         
        ELSE 'Not Eligible'
    END AS eligibility_status
FROM 
    Marks  
JOIN 
    Student ON Marks.student_id = Student.student_id;
