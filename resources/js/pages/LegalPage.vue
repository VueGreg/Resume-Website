<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue'
    import card from '../components/card.vue';

    defineProps({
        data: Object,
    })

</script>

<template>

    <LayoutPage title="Mentions Légales" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <card :withLink="false" title="POLITIQUE DE CONFIDENTIALITE" class="h-auto">
                <template #other>
                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Le but de cette politique de confidentialité</h3>
                        <p>Le but de cette politique de confidentialité est d'informer les utilisateurs de notre site des données personnelles que nous receuillons ainsi que les informations suivantes, le cas échéant:</p>
                        <ol class="p-8 list-decimal">
                            <li>Les données personnelles que nous receuillons</li>
                            <li>L'utilisation des données receuillies</li>
                            <li>Qui a accèe aux données receuillies</li>
                            <li>Les droits des utilisateurs du site</li>
                            <li>La politique de cookies du site</li>
                        </ol>
                        <p>Cette politique de confidentialité fonctionne parrallèlement aux conditions générales d'utilisation de notre site.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Lois applicables</h3>
                        <p>Conformément au <i class="italic">Règlement général sur la protection des données</i> (RGPD) cette politique de confidentialité est conforme aux règlement suivants.</p>
                        <p>Les données à caractère personnel doivent être:</p>
                        <ol class="p-8 list-decimal">
                            <li>traitées de manière licite, loyale et transparente au regard de la personne concernée (licéité, loyauté, transparence);</li>
                            <li>collectées pour finalités déterminées, explicites et légitimes, et ne pas être traitées ultérieurement d'une manière incompatible avec ces finalités; le traitement ultérieur à des fins archivistiques dans l'intérêt public, à des fins de recherche scientifique ou historique ou à des fins statistiques n'est pas considéré, conformément à l'article 89, paragraphe 1, comme incompatible avec les finalités initiales (limitation des finalités);</li>
                            <li>adéquates, pertinentes et limitées à ce qui est nécessaire au regard des finalités pour lesquelles elles sont traitées (minimisation des données);</li>
                            <li>exactes et, si nécessaire, tenues à jour; toutes les mesures raisonnables doivent être prises pour que les données à caractère personnel qui sont inexactes, eu égard aux finalités pour lesquelles elles sont traitées, soient effacées ou rectifiées sans tarder (exactitude);</li>
                            <li>conservées sous une forme permettant l'identification des personnes concernées pendant une durée n'excédant pas celle nécessaire au regard des finalités pour lesquelles elles sont traitées; les données à caractère personnel peuvent être conservées pour des durées plus longues dans la mesure où elles seront traitées exclusivement à des fins archivistiques dans l'intérêt public, à des fins de recherche scientifique ou historique ou à des fins statistiques conformément à l'article 89, paragraphe 1, pour autant que soient mises en oeuvre les mesures techniques et organisationnelles appropriées requises par le réglement afin de garantir les droits et libertés de la personne concernée (limitation de la conservation);</li>
                            <li>traitées de façon à garantir une sécurité appropriée des données à caractère personnel, y compris la protection contre le traitement non autorisé ou illicite et contre la perte, la destruction ou les dégats d'origine accidentelle, à l'aide de mesures techniques ou organisationnelles appropriées (intégrité et confidentialité).</li>
                        </ol>
                        <p>Le traitement n'est licite que si, et dans la mesure où, au moins une des conditions suivantes est remplie:</p>
                        <ol class="p-8 list-decimal">
                            <li>la personne concernée a consenti au traitement de ses données à caractère personnel pour une ou plusieurs finalités spécifiques;</li>
                            <li>le traitement est nécesaire à l'exécution d'un contrat auquel la personne concernée est partie ou à l'exécution de mesures précontractuelles prises à la demande de celle-ci;</li>
                            <li>le traitement est nécessaire au respect d'une obligation légale à laquelle le responsable du traitement est soumis;</li>
                            <li>le traitement est nécessaire à la sauvegarde des intérêt vitaux de la personne concernée ou d'une autre personne physique;</li>
                            <li>le traitement est nécessaire à l'exécution d'une mission d'intérêt public ou relevant de l'exercice de l'autorité publique dont est investi le responsable du traitement;</li>
                            <li>le traitement est nécessaire aux fins des intérêts légitimes poursuivis par le responsable du traitement ou par un tiers, moins que ne prévalent les intérêts ou les libertés et droits fondamentaux de la personne concernée qui exigent une protection des données à caractère personnel, nottamment lorsque la personne concernée est un enfant.</li>
                        </ol>
                        <p>Pour les résidents de l'Etat de la Californie, cette politique de confidentialité vise à se conformer à la <i class="italic">California Consumer Privacy Act (CCPA).</i> S'il y a des incohérences entre ce document et la CCPA, la législation de l'Etat s'appliquera. Si nous constatons des incohérences, nous modifierons notre politique pour nous conformer à la loi pertinente.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Consentement</h3>
                        <p>Les utilisateurs conviennent qu'en utilisant mon site, ils consentent à:</p>
                        <ol class="p-8 list-decimal">
                            <li>les conditions énoncées dans la présente politique de confidentialité et </li>
                            <li>la collecte, l'utilisation et la concervation des données énumérées dans la présente politique.</li>
                        </ol>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Données personnelles que je collecte</h3>
                        <h5 class="font-semibold">Données collectées automatiquement</h5>
                        <p>Je ne collecte aucune donnée automatiquementsur mon site.</p>
                        <h5 class="font-semibold">Données receuillies de façon non automatique</h5>
                        <p>Je peux également collecter les données suivantes lorsque vous effectuez certaines fonctions sur le site:</p>
                        <ol class="p-8 list-decimal">
                            <li>Nom et Prénom</li>
                            <li>Adresse Email</li>
                            <li>Toutes autres données partagées de manière délibérée par la personne expéditrice</li>
                        </ol>
                        <p>Ces données peuvent être receuillies au moyen des méthodes suivantes:</p>
                        <ol class="p-8">
                            <li>Reception Email</li>
                        </ol>
                        <p>Veuillez noter que je ne collecte que les données qui m'aiderons à atteindre l'objectif énoncé dans cette politique et de confidentialité. Je ne receuille pas de données supplémentaires sans vous en informer au préalable.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Comment j'utilise les données personnelles</h3>
                        <p>Les données personnelles receuillies sur le site seront utilisées uniquement aux fins précisées dans la présente politique ou indiquées sur les pages pertinentes du site. Je n'utiliserai pas vos données au-delà de ce que je divulguerai.</p>
                        <p>Les données que je receuille lorsque l'utilisateur exécute certaines fonctions peuvent être utilisées aux fins suivantes:</p>
                        <ol class="p-8">
                            <li>la recherche d'un emploi ou stage</li>
                        </ol>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Avec qui je partage les données personnelles</h3>
                        <h5 class="font-semibold">Tierces parties</h5>
                        <p>Les tiers ne seront pas en mesure d'accéder aux données des utilisateurs au-delà de ce qui est raisonnablement nécessaire pour atteindre l'objectif donné.</p>
                        <h5 class="font-semibold">Autres divulgations</h5>
                        <p>J m'engage à ne pas vendre ou partager vos données avec des tiers, sauf dans les cas suivant:</p>
                        <ol class="p-8 list-decimal">
                            <li>si la loi l'exige</li>
                            <li>si elle est requise pour toute procédure judiciaire</li>
                            <li>pour prover ou protéger nos droits légaux</li>
                        </ol>
                        <p>Si vous suivez les hyperliens du site vers un autre site, veuillez noter que je ne suis pas responsable et n'ai pas de contrôle sur leurs politiques et pratiques de confidentialité.</p>
                        <h5 class="font-semibold">Combien de temps je stock les données personnelles</h5>
                        <p>Je ne conserve pas les données des utilisateurs au-delà de ce qui est nécessaire pour atteindre les fins pour lesquelles elles sont receuillies</p>
                        <h5 class="font-semibold">Comment je protège vos données personnelles</h5>
                        <p>Toutes les données stockées dans mon système sont bien sécurisées et ne sont accessibles que par moi même</p>
                        <p>Alors que je prend toutes les précautions raisonnables pour m'assurer que mes données d'utilisateur sont sécurisées et que les utilisateurs sont protégés, il reste toujours du risque de préjudice. L'Internet en sa totalité peut être, parfois, peu sûr et donc je suis incapables de garantir la sécurité des données des utilisateirs au-delà de ce qui est raisonnablement pratique.</p>
                        <h5 class="font-semibold">Mineurs</h5>
                        <p>Le RGPD précise que les personnes de moins de 15 ans sont considérées comme des mineurs aux fins de la collecte de données. Les mineurs doivent avoir le consentement d'un représentant légal pour que leurs sonnées soient receuillies, traitées et utilisées.</p>
                        <h5 class="font-semibold">Vos droits en tant qu'utilisateur</h5>
                        <p>En vertu du RGPD, les utilisateurs ont les droits suivants en tant que personnes concernées:</p>
                        <ol class="p-8 list-decimal">
                            <li>droit d'accès</li>
                            <li>droit de rectification</li>
                            <li>droit à l'éffacement</li>
                            <li>droit à restreindre le traitement</li>
                            <li>droit à la portabilité des données</li>
                            <li>droit d'objection</li>
                        </ol>
                        <p>Vous trouverez de plus amples informations sur ces droites au chapitre 3 (art 12-13) du RGPD.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Comment modifier, supprimer ou contester les données receuillies</h3>
                        <p>Si vous souhaitez que vos renseignements soient supprimés ou modifiés d'une façon ou d'une autre, veuillez communiquer avec moi par Email ou par téléphone suivant ces coordonées:</p>
                        <ol class="p-8">
                            <li><i class="fa-solid fa-phone mr-2"></i>{{ data.informations[0].phone }}</li>
                            <li><i class="fa-solid fa-envelope mr-2"></i>{{ data.informations[0].email }}</li>
                        </ol>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Politique sur les cookies</h3>
                        <p>Un cookies est un petit fichier, stocké sur le disque dur d'un utilisateur par le site Web. Son but est de receuillir des données relatives aux habitudes de navigation de l'utilisateur.</p>
                        <p>J'utilise les types de cookies suivants sur le site:</p>
                        <ol class="p-8">
                            <li>
                                <h5 class="font-semibold">Cookies fonctionnels</h5>
                                <p>Je les utilise pour mémoriser toutes les sélections que vous faites sur le site afin qu'elles soient sauvegardées pour vos prochaines visites.</p>
                            </li>
                        </ol>
                        <p>Vous pouvez choisir d'être averti chaque fois qu'un cookie est transmis. Vous pouvez également choisir de désactiver les cookies entièrement dans votre navigateur Internet, mais cela peut diminuer la qualité de votre expérience d'utilisation.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Modifications</h3>
                        <p>Cette politique de confidentialité peut être modifiée à l'occasion afin de maintenir la conformité avec la loi et de tenir compte de tout changement à mon processus de collecte de données. Je recommande à mes utilisateurs de vérifier ma politique de temps à autre pour s'assurer qu'ils soient informés de toute mise à jour. Au besoin, je peux informer les utilisateurs par courriel des changements apportés à cette politique.</p>
                    </article>

                    <article class="text-xs">
                        <h3 class="text-lg font-semibold underline py-4">Contact</h3>
                        <p>Si vous avez des questions à me poser, n'hésitez pas à communiquer avec moi en utilisant ce qui suit:</p>
                        <ol class="p-8">
                            <li><i class="fa-solid fa-phone mr-2"></i>{{ data.informations[0].phone }}</li>
                            <li><i class="fa-solid fa-envelope mr-2"></i>{{ data.informations[0].email }}</li>
                        </ol>
                    </article>

                    <i class="italic">Date d'entrée en vigueur: le 13 Juin 2024.</i>
                </template>
            </card>
        </template>
    </LayoutPage>

</template>

<style scoped>

    p {
        padding-bottom: 0.8rem;
    }

    h5 {
        padding-bottom: 0.2rem;
        font-weight: bold;
    }

</style>