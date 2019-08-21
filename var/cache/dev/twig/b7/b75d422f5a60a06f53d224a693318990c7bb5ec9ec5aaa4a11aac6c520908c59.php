<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* partenaire/index.html.twig */
class __TwigTemplate_ce4ff3a1ff2ee02258b95cc5747fa5b5ad40a2db5f37fd99493ff126ac503244 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/index.html.twig"));

        // line 1
        echo "

";
        // line 3
        $this->displayBlock('title', $context, $blocks);
        // line 4
        echo "<link  rel=\"stylesheet\" href=\"https://bootswatch.com/4/lux/bootstrap.min.css\">
<link  rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css\">
<link  rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css\">
";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('body', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Contrat de Partenariat";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 14
        echo "
<div>
    ";
        // line 23
        echo "    <p>PRÉAMBULE :
Attendu que Wari est autorisée par la Loi de Transfert d'argent, à effectuer des opérations de
transfert d’argent.
Wari et .....................";
        // line 26
        echo " ont décidé de nouer un partenariat
mutuellement profitable.
A cet effet, le présent contrat de partenariat (ci-après désigné le « Contrat ») a été conclu
ENTRE
Wari, dont le siège social est à Dakar 20, Rue Amadou Assane Ndoye, Dakar représentée
par son DIRECTEUR GENERAL Monsieur Kabirou MBODJ.
Ci-après désignée LE PARTENAIRE................... ..... ";
        // line 32
        echo " dont le siège social
………………………………………………………………………est situé au -(Sénégal), représentée
par…………………………………………………agissant en qualité de gérant,
Ci-après désignée LE DISTRIBUTEUR
D’autre part,
FLEX FINANCE et………………………………………………………………….. Ont convenu de ce qui suit :
Le « Agents » et « LE FOURNISSEUR» sont également dénommés « les Parties ».
Présentation du Système Touba transfert.</p>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "partenaire/index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  115 => 32,  107 => 26,  102 => 23,  98 => 14,  91 => 9,  79 => 7,  66 => 3,  59 => 9,  56 => 8,  54 => 7,  49 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

{% block title %}Contrat de Partenariat{% endblock %}
<link  rel=\"stylesheet\" href=\"https://bootswatch.com/4/lux/bootstrap.min.css\">
<link  rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css\">
<link  rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css\">
{% block stylesheets %}{% endblock %}

{% block body %}
{# <style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style> #}

<div>
    {# <h1>Hello {{ controller_name }}! ✅</h1>

    This friendly message is coming from:
    <ul>
        <li>Your controller at <code><a href=\"{{ '/var/www/html/SYMFONY/API/DieulDioxe/DieulDioxe/src/Controller/PartenaireController.php'|file_link(0) }}\">src/Controller/PartenaireController.php</a></code></li>
        <li>Your template at <code><a href=\"{{ '/var/www/html/SYMFONY/API/DieulDioxe/DieulDioxe/templates/partenaire/index.html.twig'|file_link(0) }}\">templates/partenaire/index.html.twig</a></code></li>
    </ul> #}
    <p>PRÉAMBULE :
Attendu que Wari est autorisée par la Loi de Transfert d'argent, à effectuer des opérations de
transfert d’argent.
Wari et .....................{# {{Partenaire.RaisonSocial}} #} ont décidé de nouer un partenariat
mutuellement profitable.
A cet effet, le présent contrat de partenariat (ci-après désigné le « Contrat ») a été conclu
ENTRE
Wari, dont le siège social est à Dakar 20, Rue Amadou Assane Ndoye, Dakar représentée
par son DIRECTEUR GENERAL Monsieur Kabirou MBODJ.
Ci-après désignée LE PARTENAIRE................... ..... {# {{Partenaire.Prenom}} {{partenaire.Nom}} #} dont le siège social
………………………………………………………………………est situé au -(Sénégal), représentée
par…………………………………………………agissant en qualité de gérant,
Ci-après désignée LE DISTRIBUTEUR
D’autre part,
FLEX FINANCE et………………………………………………………………….. Ont convenu de ce qui suit :
Le « Agents » et « LE FOURNISSEUR» sont également dénommés « les Parties ».
Présentation du Système Touba transfert.</p>
</div>
{% endblock %}
", "partenaire/index.html.twig", "/var/www/html/SYMFONY/API/DieulDioxe/DieulDioxe/templates/partenaire/index.html.twig");
    }
}
