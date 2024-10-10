fetch('header.html')
.then(response => {
    if (!response.ok) {
        throw new Error('Erro ao carregar o header');
    }
    return response.text();
})
.then(data => {
    // Insere o conteúdo do header na div
    document.getElementById('header').innerHTML = data;

    // Após carregar o header, agora podemos configurar a lógica de scroll
    configurarScroll();
})
.catch(error => {
    console.error('Erro:', error);
});

function configurarScroll() {
    const links = document.querySelectorAll('.menu-navegacao a'); // Seleciona todos os links do menu
    const secoes = document.querySelectorAll('section'); // Seleciona todas as seções

    // Função para ativar o link baseado na seção visível
    function atualizarLinkAtivo() {
        const posicaoScroll = window.scrollY + window.innerHeight / 3; // Ajuste na posição para considerar a janela de visualização
        
        secoes.forEach(secao => {
            const topoSecao = secao.offsetTop; // Posição do topo da seção
            const alturaSecao = secao.clientHeight; // Altura da seção
    
            // Verifica se a seção está visível na janela ajustada
            if (posicaoScroll >= topoSecao && posicaoScroll < topoSecao + alturaSecao) {
                const id = secao.getAttribute('id'); // Obtém o ID da seção
                
                // Remove a classe 'ativo' de todos os links
                links.forEach(link => link.classList.remove('ativo'));
                // Adiciona a classe 'ativo' ao link correspondente
                document.querySelector(`.menu-navegacao a[href="#${id}"]`)?.classList.add('ativo');
            }
        });
    }

    // Verifica a URL atual e ativa o link correspondente
    function ativarLinkPorPagina() {
        const hashAtual = window.location.hash; // Obtém o hash atual da URL
    
        links.forEach(link => {
            const href = link.getAttribute('href');
            
            // Verifica se o link corresponde ao hash atual, focando no que vem após o '#'
            if (href.includes(hashAtual)) {
                link.classList.add('ativo');
            } else {
                link.classList.remove('ativo');
            }
        });
    }
    
    

    // Adiciona o evento de scroll
    window.addEventListener('scroll', atualizarLinkAtivo);

    // Chama a função para ativar o link correspondente à página atual
    ativarLinkPorPagina();

    // Scroll suave para âncoras
links.forEach(link => {
    link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        
        // Verifica se o link contém uma âncora (#) e se a navegação é dentro da mesma página
        if (href.includes('#')) {
            const idAncora = href.split('#')[1]; // Extrai o ID após o '#'
            const elementoAlvo = document.getElementById(idAncora); // Seleciona a seção correspondente
            
            if (elementoAlvo) {
                e.preventDefault(); // Impede a navegação padrão
                
                // Faz o scroll suave
                elementoAlvo.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

    
    

    // Inicializa o link ativo no carregamento da página
    atualizarLinkAtivo();
}
