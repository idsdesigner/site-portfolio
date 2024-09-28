// Adiciona a classe 'active' ao link do menu baseado na seção visível
function atualizarLinkAtivo() {
    const secoes = document.querySelectorAll('section'); // Seleciona todas as seções
    const posicaoScroll = window.scrollY; // Posição atual do scroll

    secoes.forEach(secao => {
        const topoSecao = secao.offsetTop; // Posição do topo da seção
        const alturaSecao = secao.clientHeight; // Altura da seção

        // Verifica se a seção está visível
        if (posicaoScroll >= topoSecao && posicaoScroll < topoSecao + alturaSecao) {
            const id = secao.getAttribute('id'); // Obtém o ID da seção
            // Remove a classe 'active' de todos os links
            document.querySelectorAll('.menu-navegacao a').forEach(link => link.classList.remove('active'));
            // Adiciona a classe 'active' ao link correspondente
            document.querySelector(`.menu-navegacao a[href="#${id}"]`).classList.add('active');
        }
    });
}

// Adiciona o evento de scroll
window.addEventListener('scroll', atualizarLinkAtivo);

// Verifica se a página foi carregada e atualiza o link ativo
window.addEventListener('load', () => {
    const secaoInicial = document.querySelector('section'); // Seleciona a primeira seção
    if (secaoInicial) {
        const id = secaoInicial.getAttribute('id'); // Obtém o ID da primeira seção
        // Remove a classe 'active' de todos os links
        document.querySelectorAll('.menu-navegacao a').forEach(link => link.classList.remove('active'));
        // Adiciona a classe 'active' ao link da seção inicial
        document.querySelector(`.menu-navegacao a[href="#${id}"]`).classList.add('active');
    }
});

// Inicializa o link ativo no carregamento da página
atualizarLinkAtivo();
