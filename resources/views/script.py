import os
import heapq

def find_largest_files(directory, n=10):
    """Encontra os n arquivos mais pesados em um diretório."""
    file_sizes = []

    for root, _, files in os.walk(directory):
        for file in files:
            file_path = os.path.join(root, file)
            try:
                size = os.path.getsize(file_path)
                file_sizes.append((size, file_path))
            except Exception as e:
                print(f"Erro ao acessar {file_path}: {e}")

    return heapq.nlargest(n, file_sizes, key=lambda x: x[0])

def delete_file(file_path):
    """Deleta o arquivo especificado."""
    try:
        os.remove(file_path)
        print(f"Arquivo deletado: {file_path}")
    except Exception as e:
        print(f"Erro ao deletar {file_path}: {e}")

if __name__ == "__main__":
    directory = input("Digite o diretório para buscar arquivos (ex: C:/Users/SeuNome): ")
    n = int(input("Quantos arquivos mais pesados deseja listar? "))

    largest_files = find_largest_files(directory, n)

    print("\nArquivos mais pesados encontrados:")
    for idx, (size, file_path) in enumerate(largest_files, 1):
        print(f"{idx}. {file_path} - {size / (1024 * 1024):.2f} MB")

    while True:
        delete_choice = input("\nDigite o número do arquivo a deletar (ou 'sair' para encerrar): ")
        if delete_choice.lower() == 'sair':
            break
        try:
            file_index = int(delete_choice) - 1
            if 0 <= file_index < len(largest_files):
                delete_file(largest_files[file_index][1])
            else:
                print("Número inválido. Tente novamente.")
        except ValueError:
            print("Entrada inválida. Por favor, insira um número ou 'sair'.")
