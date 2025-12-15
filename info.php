<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6 - Introduction au PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .php-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .php-header {
            background: linear-gradient(135deg, #510404ff, #04176aff);
            color: white;
            padding: 2.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        .php-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .php-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .variables-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 3rem;
        }
        
        .variable-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .variable-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        
        .variable-card h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #23046aff;
            margin-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
        }
        
        .variable-value {
            font-size: 1.1rem;
            padding: 15px;
            background-color: #f8fafc;
            border-radius: 8px;
            margin-top: 10px;
            border-left: 4px solid #550508ff;
        }
        
        .php-code {
            background-color: #1e1e1e;
            color: #d4d4d4;
            padding: 25px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
            margin: 2rem 0;
            line-height: 1.6;
        }
        
        .php-code .keyword {
            color: #569cd6;
        }
        
        .php-code .variable {
            color: #9cdcfe;
        }
        
        .php-code .string {
            color: #ce9178;
        }
        
        .php-code .number {
            color: #b5cea8;
        }
        
        .php-code .comment {
            color: #6a9955;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: #4361ee;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .back-link:hover {
            background-color: #3a0ca3;
            transform: translateY(-3px);
        }
        
        .operations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 2rem 0;
        }
        
        .operation-item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .operation-result {
            font-size: 1.8rem;
            font-weight: 700;
            color: #3a0ca3;
            margin: 10px 0;
        }
        
        .operation-desc {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-code"></i>
                <h1>Introduction au PHP</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="info.php" class="active"><i class="fas fa-info-circle"></i> Info PHP</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="php-container">
            <div class="php-header">
                <h1><i class="fas fa-code"></i> TP6 - Introduction au PHP</h1>
                <p>Déclaration de variables et exemples d'opérations</p>
            </div>
            
            <?php
            $etablissement = "FSSM";
            $module = "programmaation web2";
            $annee = "2025-2026";
          
            $nombre1 = 42;
            $nombre2 = 7;
            $nombre3 = 15.5;
            $nombre4 = 3.14;
            
            $addition = $nombre1 + $nombre2;
            $soustraction = $nombre1 - $nombre2;
            $multiplication = $nombre1 * $nombre2;
            $division = $nombre1 / $nombre2;
            $modulo = $nombre1 % $nombre2;
            $puissance = pow($nombre1, 2);
            
            $message = "Bienvenue dans l'introduction au PHP";
            $langage = "PHP";
            $version = "8.2";
            
            $concatenation = $langage . " version " . $version;
            $longueur = strlen($message);
            $majuscules = strtoupper($langage);
            
            $notes = array(15, 18, 12, 16, 14);
            $moyenne = array_sum($notes) / count($notes);
            
            $estActif = true;
            $estComplet = false;
            ?>
            
            <section class="variables-section">
                <div class="variable-card">
                    <h3><i class="fas fa-school"></i> Informations académiques</h3>
                    <p><strong>Établissement :</strong> <?php echo $etablissement; ?></p>
                    <p><strong>Module :</strong> <?php echo $module; ?></p>
                    <p><strong>Année :</strong> <?php echo $annee; ?></p>
                  
                </div>
                
                <div class="variable-card">
                    <h3><i class="fas fa-hashtag"></i> Variables numériques</h3>
                    <p><strong>nombre1 :</strong> <?php echo $nombre1; ?> (entier)</p>
                    <p><strong>nombre2 :</strong> <?php echo $nombre2; ?> (entier)</p>
                    <p><strong>nombre3 :</strong> <?php echo $nombre3; ?> (décimal)</p>
                    <p><strong>nombre4 :</strong> <?php echo $nombre4; ?> (décimal, π approximé)</p>
                </div>
                
                <div class="variable-card">
                    <h3><i class="fas fa-language"></i> Variables chaînes</h3>
                    <p><strong>Message :</strong> "<?php echo $message; ?>"</p>
                    <p><strong>Langage :</strong> <?php echo $langage; ?></p>
                    <p><strong>Version :</strong> <?php echo $version; ?></p>
                    <div class="variable-value">
                        <strong>Concaténation :</strong> <?php echo $concatenation; ?>
                    </div>
                </div>
            </section>
            
            <h2><i class="fas fa-calculator"></i> Opérations mathématiques</h2>
            <div class="operations-grid">
                <div class="operation-item">
                    <h4>Addition</h4>
                    <div class="operation-result"><?php echo "$nombre1 + $nombre2 = $addition"; ?></div>
                    <p class="operation-desc">Addition de deux entiers</p>
                </div>
                
                <div class="operation-item">
                    <h4>Soustraction</h4>
                    <div class="operation-result"><?php echo "$nombre1 - $nombre2 = $soustraction"; ?></div>
                    <p class="operation-desc">Soustraction de deux entiers</p>
                </div>
                
                <div class="operation-item">
                    <h4>Multiplication</h4>
                    <div class="operation-result"><?php echo "$nombre1 × $nombre2 = $multiplication"; ?></div>
                    <p class="operation-desc">Multiplication de deux entiers</p>
                </div>
                
                <div class="operation-item">
                    <h4>Division</h4>
                    <div class="operation-result"><?php echo "$nombre1 ÷ $nombre2 = $division"; ?></div>
                    <p class="operation-desc">Division de deux entiers</p>
                </div>
                
                <div class="operation-item">
                    <h4>Modulo</h4>
                    <div class="operation-result"><?php echo "$nombre1 % $nombre2 = $modulo"; ?></div>
                    <p class="operation-desc">Reste de la division</p>
                </div>
                
                <div class="operation-item">
                    <h4>Puissance</h4>
                    <div class="operation-result"><?php echo "$nombre1² = $puissance"; ?></div>
                    <p class="operation-desc">Carré du nombre</p>
                </div>
            </div>
            
            <h2><i class="fas fa-code"></i> Exemple de code PHP</h2>
            <div class="php-code">
                <span class="comment">// Déclaration de variables en PHP</span><br>
                <span class="keyword">&lt;?php</span><br><br>
                
                <span class="comment">// Variables de chaîne de caractères</span><br>
                <span class="variable">$etablissement</span> = <span class="string">"FSSM"</span>;<br>
                <span class="variable">$module</span> = <span class="string">"programmation web2"</span>;<br>
                <span class="variable">$annee</span> = <span class="string">"2025-2026"</span>;<br><br>
                
                <span class="comment">// Variables numériques</span><br>
                <span class="variable">$nombre1</span> = <span class="number">42</span>;<br>
                <span class="variable">$nombre2</span> = <span class="number">7</span>;<br><br>
                
                <span class="comment">// Opérations mathématiques</span><br>
                <span class="variable">$addition</span> = <span class="variable">$nombre1</span> + <span class="variable">$nombre2</span>; <span class="comment">// Résultat: 49</span><br>
                <span class="variable">$multiplication</span> = <span class="variable">$nombre1</span> * <span class="variable">$nombre2</span>; <span class="comment">// Résultat: 294</span><br><br>
                
                <span class="comment">// Affichage des résultats</span><br>
                <span class="keyword">echo</span> <span class="string">"Résultat de l'addition : "</span> . <span class="variable">$addition</span>;<br>
                <span class="keyword">echo</span> <span class="string">"&lt;br&gt;"</span>;<br>
                <span class="keyword">echo</span> <span class="string">"Résultat de la multiplication : "</span> . <span class="variable">$multiplication</span>;<br><br>
                
                <span class="keyword">?&gt;</span>
            </div>
            
            <div class="variable-card">
                <h3><i class="fas fa-chart-bar"></i> Statistiques des notes</h3>
                <p><strong>Notes :</strong> <?php echo implode(", ", $notes); ?></p>
                <p><strong>Moyenne :</strong> <?php echo number_format($moyenne, 2); ?> / 20</p>
                <p><strong>Note maximale :</strong> <?php echo max($notes); ?> / 20</p>
                <p><strong>Note minimale :</strong> <?php echo min($notes); ?> / 20</p>
            </div>
            
            <div style="text-align: center; margin: 3rem 0;">
                <a href="index.html" class="back-link">
                    <i class="fas fa-arrow-left"></i> Retour à la calculatrice
                </a>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h3>TP6 - Introduction au PHP</h3>
                <p>Technologies utilisées: HTML5, CSS3, JavaScript, PHP</p>
                <p>Année 2025-2026 | FSSM |  Module: programmation web2</p>
            </div>
            <div class="footer-links">
                <a href="index.html"><i class="fas fa-calculator"></i> Calculatrice</a>
                <a href="info.php"><i class="fas fa-code"></i> Page PHP</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>  TP6 - Mini-Application Web Avancée</p>
        </div>
    </footer>
</body>
</html>