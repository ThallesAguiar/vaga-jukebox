<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <form class="col-sm-12 col-md-12">
          <div class="form-group">
            <label for="name">Nome da pessoa</label>
            <input
              v-model.trim="pessoas.nome"
              type="text"
              class="form-control"
              id="name"
              placeholder="Seu nome"
            />
          </div>
          <div class="form-group">
            <label for="lastName">Sobrenome</label>
            <input
              v-model.trim="pessoas.sobrenome"
              type="text"
              class="form-control"
              id="lastName"
              placeholder="Seu sobrenome"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email</label>
            <input
              v-model="pessoas.email"
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Seu email"
            />
          </div>
          <div class="form-group">
            <label for="telephone">Telefone</label>
            <input
              v-model="pessoas.telefone"
              type="text"
              class="form-control"
              id="telephone"
              placeholder="(DDD) 9xxxx-xxxx"
            />
          </div>
          <!-- <div class="form-group">
            <label for="pj" title="Pessoa que possuí CNPJ"
              >Você é uma pessoa Juridica?</label
            >
            <select class="custom-select" id="pj">
              <option selected value="0">Escolher...</option>
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </div> -->
          <br />
          <label for="pj">Você é uma pessoa Juridica?</label>
          <span
            title="Pessoa que possuí CNPJ"
            class="badge badge-primary badge-pill"
            >?</span
          >
          <br />
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="pj"
              id="pj1"
              value="0"
              checked
              v-model="pessoas.pj"
            />
            <label class="form-check-label" for="pj1"> Não </label>
          </div>
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="pj"
              id="pj2"
              value="1"
              v-model="pessoas.pj"
            />
            <label class="form-check-label" for="pj2"> Sim </label>
          </div>
          <br />
          <br />
          <br />
          <div v-if="pessoas.pj == 0" class="form-group">
            <label for="cpf">CPF</label>
            <input
              v-model="pessoas.cpf"
              type="text"
              class="form-control"
              id="cpf"
              placeholder="seu CPF"
            />
          </div>
          <div v-else-if="pessoas.pj == 1" class="form-group">
            <label for="cnpj">CNPJ</label>
            <input
              v-model="pessoas.cnpj"
              type="text"
              class="form-control"
              id="cnpj"
              placeholder="seu CNPJ"
            />
          </div>
          <!-- <button type="button" class="btn btn-secundary">Editar</button> -->
          <button
            type="button"
            class="btn btn-primary"
            @click="salvar(pessoas)"
          >
            Salvar
          </button>
        </form>
      </div>

      <div class="col-sm-6">
        <h3>Tabela</h3>
        <div v-if="this.pessoasDoFormulario[0]">
          <div
            class="card"
            v-for="(pessoa, index) in pessoasDoFormulario"
            :key="index"
          >
            <div class="card-header">Informações das pessoas</div>

            <ul class="list-group list-group-flush text-left">
              <br />

              <li class="list-group-item">
                <strong>Nome Completo: {{ nomeCompleto }}</strong>
              </li>
              <li class="list-group-item">
                <strong>Email: {{ pessoa.email }}</strong>
              </li>
              <li class="list-group-item">
                <strong>Telefone: {{ pessoa.telefone }}</strong>
              </li>
              <li class="list-group-item">
                <strong>PJ: {{ pessoa.pj }}</strong>
              </li>
              <li v-if="pessoa.pj == 0" class="list-group-item">
                <strong>CPF: {{ pessoa.cpf }}</strong>
              </li>
              <li v-if="pessoa.pj == 1" class="list-group-item">
                <strong>CNPJ: {{ pessoa.cnpj }}</strong>
              </li>
              <li class="list-group-item">
                <button
                  type="button"
                  class="btn btn-warning btn-sm col-sm-3 mr-2"
                  @click="editar(index)"
                >
                  Editar
                </button>
                <button
                  type="button"
                  class="btn btn-danger btn-sm col-sm-3"
                  @click="remover(index)"
                >
                  Remover
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div v-else><p>Preencha o formulário!</p></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    pessoas: {
      nome: "",
      sobrenome: "",
      email: "",
      telefone: "",
      pj: null,
      cpf: "",
      cnpj: "",
    },

    pessoasDoFormulario: [],
  }),

  computed: {
    nomeCompleto() {
      return this.pessoas.nome + " " + this.pessoas.sobrenome
    },
  },

  methods: {
    salvar() {
      const pessoas = Object.assign({}, this.pessoas);
      this.pessoasDoFormulario.push(pessoas);
    },

    editar(index){
      // this.pessoasDoFormulario[index] = Object.assign(this.pessoasDoFormulario[index], this.pessoas);
      this.pessoas = this.pessoasDoFormulario[index];
    },

    remover(index){
      this.pessoasDoFormulario.splice(index,1);      
    }
  },
};
</script>

<style>
</style>